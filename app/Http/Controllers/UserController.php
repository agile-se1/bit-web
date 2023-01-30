<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    //Helper function
    /**
     * @throws \Exception
     */
    public static function createNewHash(): string
    {
        //Creates a 14 digit hash
        $bytes = random_bytes(7);
        return bin2hex($bytes);
    }
}
