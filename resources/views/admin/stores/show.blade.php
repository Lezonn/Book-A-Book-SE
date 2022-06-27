@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $store->store_name }}</h1>

            <a href="/admin/stores" class="btn btn-success"><span data-feather="arrow-left"></span>Back</a>
            <a href="/admin/stores/{{ $store->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/admin/stores/{{ $store->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            <div style="max-height: 350px; overflow:hidden;">
                <img src={{ $store->image ? $book->image : 'https://source.unsplash.com/1200x400?bookstore' }} class="img-fluid mt-3" alt="{{ $store->store_name }}">
            </div>


            <div>
                <p>{{ $store->store_address }}</p>
                <p>{{ $store->store_telephone }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
