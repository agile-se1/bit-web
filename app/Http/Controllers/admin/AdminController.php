<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralPresentationDecision;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Throwable;

class AdminController extends Controller
{

    public function index (): Factory|View|Application
    {
        return view('admin.dashboard');
    }

    public function resetWebsite(): Redirector|RedirectResponse|Application
    {
        try{
            DB::beginTransaction();

            ProfessionalField::query()->update(['current_count' => 0]);
            ProfessionalFieldDecision::query()->delete();

            GeneralPresentationDecision::query()->delete();

            User::query()->delete();

            DB::commit();
        } catch (Throwable){
            DB::rollBack();
            return redirect()->back()->withErrors('Die Website konnte nicht zurück gesetzt werden.');
        }

        return redirect('/admin/dashboard')->with('message', 'Die Website wurde zurückgesetzt.');
    }
}
