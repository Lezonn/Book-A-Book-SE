<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('name', '!=', 'SuperAdmin')
                    ->whereRelation('role', 'role_name', 'like', 'SuperAdmin')
                    ->orWhereRelation('role', 'role_name', 'like', 'Admin')
                    ->get();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'roles' => Role::all(),
            'stores' => Store::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->role_name == 'SuperAdmin') {
            $request['store_id'] = 0;
            $validatedData['store_id'] = 0;
        }

        $validatedData = $request->validate([
            'role_id' => 'required',
            'store_id' => 'required',
            'name' => 'required|max:32',
            'slug' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'password' => 'required|min:6|max:32'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/admin/users')->with('success', 'New admin has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all(),
            'stores' => Store::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->role_name == 'SuperAdmin') {
            $request['store_id'] = 0;
            $validatedData['store_id'] = 0;
        }

        $rules = [
            'role_id' => 'required',
            'store_id' => 'required',
            'name' => 'required|max:32',
            'password' => 'required|min:6|max:32'
        ];

        if($request->slug != $user->slug) {
            $rules['slug'] = 'required|unique:users';
        }
        if($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }
        if($request->phone_number != $user->phone_number) {
            $rules['phone_number'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
                    ->update($validatedData);

        return redirect('/admin/users')->with('success', 'Admin has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/admin/users')->with('success', 'Admin has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(User::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
