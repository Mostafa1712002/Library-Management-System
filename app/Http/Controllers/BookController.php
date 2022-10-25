<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class BookController extends Controller
{
    private $book;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $records = $this->book->orderBy("updated_at", "DESC")->get();
        return view('books.index', compact('records'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {

        $locales = [
            'ar' => [
                'title' => $request->title_ar,
                'description' => $request->description_ar,
            ],
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en,
            ],
        ];
        DB::transaction(function () use ($request, $locales) {
            $record = $this->book->create([
                'slug' => generateSlug(getTitle($locales)),
                'author' => $request->author,
                'isbn' => $request->isbn,
            ]);
            foreach ($request->images as $image) {
                uploadImage($record, $image);
            }
            $record->tags()->attach($request->tags);

            setLocales($record, $locales, $record->id);
            flash('Book created successfully')->success();
        });
        return to_route('index');
    }

    public function edit($id)
    {

        $record = $this->book->findOrFail($id);
        return view('books.edit', compact('record'));
    }

    public function update(UpdateBookRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            $record = $this->book->findOrFail($id);

            $record->update(array_filter($request->all()));

            return to_route("books.index");
        });
    }

    public function destroy($id)
    {
        $record = $this->book->findOrFail($id);
        $record->delete();

        return response()->json(['success' => true], 200);
    }
}
