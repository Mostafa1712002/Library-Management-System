<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function toggleLang($lang)
    {
        app()->setLocale($lang);
        $books = \App\Models\Book::with('media', 'locales')->orderBy('updated_at', "desc")->get();
        return view('books.index', compact('books'));
    }

    public function destroyMedia($id)
    {

        $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::find($id);
        $media->delete();
        flash('Media deleted successfully')->success();

        return redirect()->back();
    }
}
