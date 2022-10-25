<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function index()
    {
        return view('index');
    }


    public function toggleLang($lang)
    {
        app()->setLocale($lang);
        return view('index');
    }
}
