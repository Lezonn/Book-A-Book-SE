@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $user->name }}</h1>

            <a href="/admin/users" class="btn btn-success"><span data-feather="arrow-left"></span>Back</a>
            <a href="/admin/users/{{ $user->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/admin/users/{{ $user->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form>

        </div>
    </div>
</div>
@endsection
