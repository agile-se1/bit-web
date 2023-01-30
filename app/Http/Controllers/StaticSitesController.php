<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;

class StaticSitesController extends Controller
{
    public function showHome(): Factory|View|Application
    {
        return view('sites.home');
    }
}
