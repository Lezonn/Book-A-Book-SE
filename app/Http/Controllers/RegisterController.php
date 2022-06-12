<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RegisterController extends Controller
{
    public function index() {
        return view('marketplace.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:64',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32'
        ]);

        $role = Role::where('role_name', 'Customer')->get();
        $slug = SlugService::createSlug(User::class, 'slug', $request->name);

        $validatedData['role_id'] = $role[0]->id;
        $validatedData['store_id'] = 0;
        $validatedData['slug'] = $slug;

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration succesfully! Please login');
    }
}
