@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit book</h1>
</div>

<div class="col-lg-8">
    <form class="mb-5" method="POST" action="/admin/books/{{ $book->slug }}" enctype="multipart/form-data" id="createStore">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Book Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $book->title) }}" disabled>
          @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $book->slug) }}" disabled>
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price', $book->price) }}">
            @error('price')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" required value="{{ old('author', $book->author) }}" disabled>
            @error('author')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea rows="3" type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required disabled>{{ old('description', $book->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="pages" class="form-label">Pages</label>
                        <input type="text" class="form-control @error('pages') is-invalid @enderror" id="pages" name="pages" required value="{{ old('pages', $book->pages) }}" disabled>
                    @error('pages')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                     <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" required value="{{ old('stock', $book->stock) }}">
                    @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" required value="{{ old('weight', $book->weight) }}" disabled>
                    @error('weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" required value="{{ old('publisher', $book->publisher) }}" disabled>
                    @error('publisher')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="publish_date" class="form-label">Publish Date</label>
                     <input type="text" class="form-control @error('publish_date') is-invalid @enderror" id="publish_date" name="publish_date" required value="{{ old('publish_date', \Carbon\Carbon::parse($book->publish_date)->format('d/m/Y')) }}" disabled>
                    @error('publish_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Book image</label>
            <input type="hidden" name="oldImage" value="{{ $book->image }}">
            @if($book->image)
                <img src={{ $book->image }} class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid">
            @endif

            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit Book</button>
      </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function() {
        fetch('/admin/books/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection

