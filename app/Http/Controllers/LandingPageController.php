<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingPage.index', [
            'stores' => Store::all()
        ]);
    }
}
