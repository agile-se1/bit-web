<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminCSVController extends Controller
{
    public function createUserByCSV(){
        return view('admin.createUserByCSV');
    }

    public function storeUserByCSV(Request $request)
    {
        //Validation of file
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        //Reads files and saves rows in array
        try {
            $file = $request->file('file');
            $csvData = file_get_contents($file);
            $rows = explode("\r\n", $csvData);

            //Creates $header
            $header = array_shift($rows);
            $header = explode(';', $header);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("The CSV format does not match the required format");
        }

        $userArray = [];
        //Loops throw each $rows and creates a new user (only data) for each $row
        foreach ($rows as $rowString) {
            //Combines $row with $header
            $row = explode(';', $rowString);
            $row = array_combine($header, $row);

            //Validation
            try {
                if (trim($row['first_name']) == "") {
                    $row['first_name'] = null;
                }
                if (trim($row['surname']) == "") {
                    $row['surname'] = null;
                }

                if (key_exists('email', $row)) {
                    if (trim($row['email']) == "") {
                        $row['email'] = null;
                    }
                    if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
                        $row['email'] = null;
                    }
                }
            } catch (\Exception $e) {
                return redirect()->back()->withErrors("A required column is missing.");
            }

            //Add the hash
            try {
                $row['hash'] = UserController::createNewHash();
            } catch (\Exception $e) {
                return redirect()->back()->withErrors("There was a problem with the User Hash. Please try again");
            }

            //If there is no email address, it will use the Iserv-Email address
            if (!key_exists('email', $row) || is_null($row['email'])) {
                //Add the email address Format: max.mustermann@gym-mellendorf.de
                $row['email'] = $row['first_name'] . "." . $row['surname'] . "@gym-mellendorf.de";
                $row['email'] = strtolower($row['email']);
            }

            //Saves validated input in array
            $userArray[] = $row;
        }

        //Tries to save everything into the database or update the entry
        try {
            User::upsert($userArray, ['email'], ['first_name', 'surname']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("CSV file could not be converted to users. Please look for missing cells.");
        }

        return redirect()->back()->with('success', 'User created successfully');
    }
}
