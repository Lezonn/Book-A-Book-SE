<link rel="stylesheet" href="/css/marketplace/book.css">
@extends('marketplace.layouts.main')

@section('container')
<section class="mt-5">
    <div class="container mb-5">

        <div class="row">
            <div class="col-lg-3">
                <img src={{ $book->image ? $book->image : 'https://source.unsplash.com/1200x400?book' }} class="card-img-top img-fluid" alt="{{ $book->title }}" >
            </div>
            <div class="col-lg-7 offset-lg-1">
                <h1 class="title">{{ $book->title }} by {{ $book->author }}</h1>
                <hr>
                <h6>{{ $book->stock }} items left.</h6>
                <h6 class="price">Rp. {{ $book->price }}</h6>
                <br>
                <h4 class="identity">Book's Description</h4>
                <p class="desc">{{ $book->description }}</p>

                <h4 class="identity">Book's Detail : </h4>
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="id">Pages : </h6>
                        <p class="content">{{ $book->pages }}</p>

                        <h6 class="id">First Publish Date : </h6>
                        <p class="content">{{ date('d-m-Y', strtotime($book->publish_date)) }}</p>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="id">Publisher : </h6>
                        <p class="content">{{ $book->publisher }}</p>

                        <h6 class="id">Weight : </h6>
                        <p class="content">{{ $book->weight }}</p>
                    </div>
                </div>
                <br>
                <form method="POST" action="/cart">
                    @csrf
                    <input type="hidden" name="store_id" value={{ $store->id }}>
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <div class="mb-3 col-2">
                      <label for="qty" class="form-label">Quantity</label>
                      <input type="number" class="form-control" id="qty" value="0" name="qty" min="1" max="{{ $book->stock }}">
                    </div>
                    @error('qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="btn-cart">
                        <button type="submit" class="btn btn-dark btn-explore">Add to cart</button>
                    </div>
                    @if(session()->has('success'))
                    <div class="mt-2 alert alert-dismissible alert-success col-lg-8 fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
