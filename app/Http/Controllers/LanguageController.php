<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    
        public function english(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }

        public function gujrati(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','gujrati');
        return redirect()->back();
    }
}
