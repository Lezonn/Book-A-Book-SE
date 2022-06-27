<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        return view('marketplace.stores', [
            'stores' => Store::all()
        ]);
    }

    public function show(Store $store)
    {
        return view('marketplace.store.index', [
            'store' => $store,
            'books' => Book::where('store_id', $store->id)->Filter(request(['search']))->take(10)->get()
        ]);
    }
}
