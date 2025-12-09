<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalController extends Controller
{
     public function __invoke(Request $request)
    {
        $locale = $request->input('locale');
        // Validate the locale if necessary
        if (in_array($locale, ['en', 'myan'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }
        return redirect()->back();
    }
}
