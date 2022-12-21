<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class AdminAccountController extends Controller
{
    public function createUserByCSV(){
        return view('admin.createUserByCSV');
    }

    public function storeUserByCSV(Request $request){

        //Validation
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        //Read files and save rows in array
        $file = $request->file('file');
        $csvData = file_get_contents($file);
        $rows = explode("\r\n", $csvData);

        //Create $header
        $header = array_shift($rows);
        $header = explode(';', $header);

        //Loop throw each $rows and create a new user for each $row
        foreach ($rows as $rowString){
            //Combine $row with $header
            $row = explode(';', $rowString);
            $row = array_combine($header, $row);

            //Validation
            if(trim($row['first_name']) == ""){
                $row['first_name'] = null;
            }
            if(trim($row['surname']) == ""){
                $row['surname'] = null;
            }
            if(trim($row['email']) == ""){
                $row['email'] = null;
            }
            if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
                $row['email'] = null;
            }


            //Try to create a user
            try{
                User::create([
                    'first_name' => $row['first_name'],
                    'surname' => $row['surname'],
                    'email' => $row['email']
                ]);
            } catch (\Exception $e){
                return redirect('/admin/createUserByCSV')->withErrors('A user could be created');
            }
        }
        return redirect('/');
    }
}
