<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//Just for test purposes
class TestSitesController extends Controller
{
    //Auth
    public function testLoginLinks (){
        return view('test.testLoginLinks');
    }

    public function showAuthData (){
        return view('test.showAuthData');
    }

}
