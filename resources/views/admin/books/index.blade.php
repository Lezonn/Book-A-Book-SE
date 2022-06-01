@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All books</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-dismissible alert-success col-lg-8 fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif

<div class="table-responsive col-lg-8">
    <a href="/admin/books/create" class="btn btn-primary mb-3">Create new book</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Stock</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($books as $book)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->stock }}</td>
            <td>{{ $book->price }}</td>
            <td>
                <a href="/admin/books/{{ $book->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/admin/books/{{ $book->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/admin/books/{{ $book->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
            </td>
          </tr>
          @endforeach

      </tbody>
    </table>
  </div>
@endsection
