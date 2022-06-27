<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('admin.books.index', [
            'books' => Book::where('store_id', $user->store->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();


        $validatedData = $request->validate([
            'title' => 'required|max:64',
            'slug' => 'required|unique:books',
            'price' => 'required',
            'author' => 'required',
            'image' => 'image|file|max:2048',
            'description' => 'required',
            'pages' => 'required',
            'weight' => 'required',
            'publisher' => 'required',
            'stock' => 'required',
            'publish_date' => 'required'
        ]);
        $validatedData['store_id'] = $user->store->id;



        if($request->file('image')) {
            // $validatedData['image'] = $request->file('image')->store('book-images');
            $image  = $request->file('image');
            $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            $validatedData['image'] = $result;
        }

        Book::create($validatedData);

        return redirect('/admin/books')->with('success', 'New book has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'price' => 'required',
            'image' => 'image|file|max:2048',
            'stock' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            // if($request->oldImage) {
            //     Storage::delete($request->oldImage);
            // }
            // $validatedData['image'] = $request->file('image')->store('book-images');
            $file = $request->file('image');
            $result = CloudinaryStorage::replace($book->image, $file->getRealPath(), $file->getClientOriginalName());
            $validatedData['image'] = $result;
        }

        Book::where('id', $book->id)
                    ->update($validatedData);

        return redirect('/admin/books')->with('success', 'Book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->image) {
            // Storage::delete($book->image);
            CloudinaryStorage::delete($book->image);
        }

        Book::destroy($book->id);

        return redirect('/admin/books')->with('success', 'Book has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
