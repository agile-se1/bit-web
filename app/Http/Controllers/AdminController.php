<?php

namespace App\Http\Controllers;

use App\Models\GeneralPresentationDecision;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index (){
        return view('admin.dashboard');
    }

    public function resetWebsite(){
        try{
            DB::beginTransaction();

            ProfessionalField::query()->update(['current_count' => 0]);
            ProfessionalFieldDecision::query()->delete();

            GeneralPresentationDecision::query()->delete();

            User::query()->delete();

            DB::commit();
        } catch (\Throwable $e){
            DB::rollBack();
            return redirect()->back()->withErrors('Couldn\'t delete data');
        }

        return redirect('/admin/dashboard')->with('message', 'Data deleted');
    }
}
