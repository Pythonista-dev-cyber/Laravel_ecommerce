<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function upload(Request $request,$id){

        $photo=$request->file('photo');

        if($photo){
            $photo_name="user_".rand(100,999).".".$photo->extension();
            $photo->move(public_path('images'),$photo_name);
        }

        $user=User::find($id);
        $user->update(['photo'=>$photo_name]);

        return redirect()->back()->with('update','Successfully updated...');

    }
}
