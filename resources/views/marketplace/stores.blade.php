<link rel="stylesheet" href="/css/marketplace/stores.css">
@extends('marketplace.layouts.main')

@section('container')
    <section class="mt-4">
        <h1>Choose Your Store</h1>
        @foreach ( $stores as $store )
            <div class="card" style="width: 38rem;">
                <a href="/stores/{{ $store->slug }}/books">
                    <img src={{ $store->image ? asset('storage/' . $store->image) : 'https://source.unsplash.com/1600x900?book' }} class="img-fluid mt-3" alt="{{ $store->store_name }}">
                </a>
                <div class="card-body">
                    <h5 class="card-text">{{ $store->store_name }}</h5>
                    <p>{{ $store->store_address }}</p>
                    <p>Telephone : {{ $store->store_telephone }}</p>
                </div>
            </div>
            <hr class="line mb-5">
        @endforeach
    </section>
@endsection

