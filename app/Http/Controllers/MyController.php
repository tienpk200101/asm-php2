<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function uploadFile(Request $request){
//        die('123');
        if($request->hasFile('myFile')) {
            $files = $request->file('myFile')->store('public/profile');
            echo $files;
            echo "<br/>";

            return substr($files, strlen('public/profile/'));
        } else {
            echo "Chưa có file";
        }
    }
}
