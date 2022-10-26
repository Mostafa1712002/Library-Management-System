<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{


    public function create()
    {
        return view('tags.create');
    }
    public function store(StoreTagRequest $request)
    {
        Tag::create([
            "name" => $request->name,
        ]);
        flash()->success(__('message.added_successfully'));

        return back();
    }
}
