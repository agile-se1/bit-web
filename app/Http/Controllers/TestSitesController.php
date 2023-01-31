<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;


//Just for test purposes
class TestSitesController extends Controller
{
    //Auth
    public function testLoginLinks (): Factory|View|Application
    {
        return view('test.testLoginLinks');
    }

    public function showAuthData (): Factory|View|Application
    {
        return view('test.showAuthData');
    }

}
