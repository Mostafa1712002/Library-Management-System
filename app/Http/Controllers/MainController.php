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

    public function destroyMedia($id)
    {

        $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::find($id);
        $media->delete();
        flash('Media deleted successfully')->success();

        return redirect()->back();
    }
}
