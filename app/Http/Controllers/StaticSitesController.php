<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticSitesController extends Controller
{
    public function showHome(){
        return view('sites.home');
    }
}
