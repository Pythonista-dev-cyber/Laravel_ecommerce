<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function change($lang)
    {





        if (!in_array($lang, ['en', 'myan'])) {
            abort(400);
        }

        Session::put('locale', $lang);
        if($lang=='en'){
             App::setLocale(Session::get('locale','en'));
        }
        else if($lang=='myan'){
             App::setLocale(Session::get('locale','myan'));
        }


        return redirect()->back();
    }
}
