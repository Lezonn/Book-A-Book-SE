<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stores.index', [
            'stores' => Store::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'store_name' => 'required|max:25|unique:stores',
            'slug' => 'required|unique:stores',
            'store_telephone' => 'required',
            'store_address' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if($request->file('image')) {
            // $validatedData['image'] = $request->file('image')->store('store-images');
            $image  = $request->file('image');
            $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            $validatedData['image'] = $result;

        }

        Store::create($validatedData);

        return redirect('/admin/stores')->with('success', 'New store has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('admin.stores.show', [
            'store' => $store
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('admin.stores.edit', [
            'store' => $store
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $rules = [
            'store_telephone' => 'required',
            'store_address' => 'required'
        ];

        if($request->slug != $store->slug) {
            $rules['slug'] = 'required|unique:stores';
        }
        if($request->store_name != $store->store_name) {
            $rules['store_name'] = 'required|max:25|unique:stores';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            // if($request->oldImage) {
            //     Storage::delete($request->oldImage);
            // }
            // $validatedData['image'] = $request->file('image')->store('store-images');
            $file = $request->file('image');
            $result = CloudinaryStorage::replace($store->image, $file->getRealPath(), $file->getClientOriginalName());
            $validatedData['image'] = $result;
        }

        Store::where('id', $store->id)
                    ->update($validatedData);

        return redirect('/admin/stores')->with('success', 'Store has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        if($store->image) {
            // Storage::delete($store->image);
            CloudinaryStorage::delete($store->image);
        }

        Store::destroy($store->id);

        return redirect('/admin/stores')->with('success', 'Store has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Store::class, 'slug', $request->storeName);
        return response()->json(['slug' => $slug]);
    }
}
