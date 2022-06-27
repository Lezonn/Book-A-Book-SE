<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Store;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show(Store $store, Book $book) {
        return view('marketplace.store.book', [
            'book' => Book::where('id', $book->id)->first(),
            'store' => $store
        ]);
    }
}
