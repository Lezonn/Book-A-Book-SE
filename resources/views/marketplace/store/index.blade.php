<link rel="stylesheet" href="/css/marketplace/store.css">
@extends('marketplace.layouts.main')

@section('container')
@if(session()->has('success'))
    <div class="alert alert-dismissible alert-success col-lg-12 fade show mt-2" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<section class="promoCarousel" id="promoCarousel">
    <div id="carouselStore" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselStore" data-bs-slide-to="0" class="active slide-indicator" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselStore" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://source.unsplash.com/1600x900?book">
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="https://source.unsplash.com/1600x900?book">
            </div>
        </div>
    </div>
</section>

<section class="list-book mt-5 mb-5">
    <div class="container">

        <div class="row">
            @foreach ($books as $book)
            <div class="col-lg-3">
                <a href="/stores/{{ $store->slug }}/{{ $book->slug }}">
                    <div class="card" style="width: 15rem;">
                        <div class="book-image">
                            <img src={{ $book->image ? $book->image : 'https://source.unsplash.com/1200x400?book' }} class="card-img-top img-fluid" alt="{{ $book->title }}" >
                        </div>
                        <div class="card-body">
                          <p class="card-author">{{ $book->author}}</p>
                          <p class="card-title">{{ $book->title }}</p>
                          <p class="card-price">Rp. {{ $book->price }}</p>
                          <p class="card-stock">{{ $book->stock }} items left.</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</section>
@endsection

