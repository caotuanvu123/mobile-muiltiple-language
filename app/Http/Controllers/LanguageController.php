<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function postLang(Request $request)
    {
        Session::put('locale', $request->input('locale'));
        return redirect()->back();
    }
}
