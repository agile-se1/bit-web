<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class AdminCSVController extends Controller
{
    public function createUserByCSV(): Factory|View|Application
    {
        return view('admin.createUserByCSV');
    }

    public function storeUserByCSV(Request $request): RedirectResponse
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
        } catch (Throwable) {
            return redirect("/admin/user")->with("errors", "Die Datei konnte nicht als CSV-Datei umgewandelt werden.");
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
            } catch (Throwable) {
                return redirect()->back()->withErrors("Die Datei enthält nicht alle benötigten Spalten.");
            }

            //Add the hash
            try {
                $row['hash'] = UserController::createNewHash();
            } catch (Throwable) {
                return redirect()->back()->withErrors("Der User-Hash konnte nicht erfolgreich erstellt werden.");
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
        } catch (Throwable) {
            return redirect()->back()->withErrors("Die CSV-Datei konnte nicht erfolgreich umgewandelt werden. Überprüfe ob es leere Zellen gibt und versuche es erneut.");
        }

        return redirect()->back()->with('success', 'Die User wurden erfolgreich in der Datenbank gespeichert.');
    }
}
