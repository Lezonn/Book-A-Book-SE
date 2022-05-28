@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>

<div class="col-lg-8">
    <form class="mb-5" method="POST" action="/admin/stores" enctype="multipart/form-data" id="createStore">
        @csrf
        <div class="mb-3">
          <label for="store_name" class="form-label">Store name</label>
          <input type="text" class="form-control @error('store_name') is-invalid @enderror" id="store_name" name="store_name" required autofocus value="{{ old('store_name') }}">
          @error('store_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Telephone</label>
            <input type="text" class="form-control @error('store_telephone') is-invalid @enderror" id="store_telephone" name="store_telephone" required autofocus value="{{ old('store_telephone') }}">
            @error('store_telephone')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Address</label>
            <textarea rows="3" type="text" class="form-control @error('store_address') is-invalid @enderror" id="store_address" name="store_address" required autofocus value="{{ old('store_address') }}"></textarea>
            @error('store_address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Store image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create store</button>
      </form>
</div>

<script>
    const storeName = document.querySelector('#store_name');
    const slug = document.querySelector('#slug');
    storeName.addEventListener('change', function() {
        fetch('/admin/stores/checkSlug?storeName=' + storeName.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection

