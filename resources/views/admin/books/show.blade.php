@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $book->title }}</h1>

            <a href="/admin/books" class="btn btn-success"><span data-feather="arrow-left"></span>Back</a>
            <a href="/admin/books/{{ $book->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/admin/books/{{ $book->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            <div style="max-height: 350px; overflow:hidden;">
                <img src={{ $book->image ? asset('storage/' . $book->image) : 'https://source.unsplash.com/1200x400?book' }} class="img-fluid mt-3" alt="{{ $book->title }}">
            </div>

            <ul class="list-group list-group mt-3">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Book Title</div>
                    {{ $book->title }}
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Book Price</div>
                    {{ $book->price }}
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Book Author</div>
                    {{ $book->author }}
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">Description</div>
                      {{ $book->description }}
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">Stock</div>
                      {{ $book->stock }}
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">Pages</div>
                      {{ $book->pages }}
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">Book Publisher</div>
                      {{ $book->publisher }}
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">Book Weight</div>
                      {{ $book->weight }}
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">Publish Date</div>
                      {{ $book->publish_date }}
                    </div>
                  </li>
            </ul>

        </div>
    </div>
</div>
@endsection
