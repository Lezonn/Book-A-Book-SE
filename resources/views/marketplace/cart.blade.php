<link rel="stylesheet" href="/css/marketplace/cart.css">
@extends('marketplace.layouts.main')

@section('container')

<div class="container mt-4 mb-4">
    @if(session()->has('error'))
        <div class="alert alert-dismissible alert-danger col-lg-12 fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <center>
        <h1>My Cart</h1>
    </center>

    @if($cartAvailable == "0")
        <div class="empty">
            <h3>Your cart is still empty</h3>
        </div>
    @endif

    @foreach ($stores as $store)

        @if($store["books"] != null)
            <h2>{{ $store->store_name }}</h2>
            @php $totalPrice = 0; @endphp
            @foreach($store["books"] as $book)
                <div class="box">
                    <div class="row">
                        <div class="col-md-2">
                            <img src={{ $book->image ? $book->image : 'https://source.unsplash.com/1200x400?book' }} class="book-img" alt="{{ $book->title }}" >
                        </div>
                        <div class="col-md-8 desc">
                            <div class="title">
                                <h4>
                                    {{ $book->title }}
                                </h4>
                            </div>
                            <div class="author">
                                {{ $book->author }}
                            </div>
                        </div>
                        <div class="col-md-2 detail">
                            <div class="qty">
                                Quantity : {{ $book->qty }} pcs
                            </div>

                            <div class="total">
                                SubTotal : Rp {{ $book->qty * $book->price }}
                            </div>
                        </div>
                    </div>
                </div>
                @php $totalPrice += ($book->price * $book->qty) @endphp
            @endforeach

            <form action="/cart/checkout" method="POST" class="final-total mb-5">
                @csrf
                <input type="hidden" name="total_price" value={{ $totalPrice }}>
                <input type="hidden" name="store_id" value={{ $store->id }}>
                <div class="totalPrice">
                    <h5>
                        Total Book Price : Rp {{ $totalPrice }}
                    </h5>
                </div>
                <button type="submit" class="checkout">Checkout</button>
            </form>
        @endif


    @endforeach



    {{-- @if($stores == null)
        <h1>Cart is empty</h1>
    @else
        @php
            $lastStore = null;
        @endphp
        @foreach ($carts as $cart)
            @if ($cart->store->id != $lastStore)
                <h1>{{ $cart->store->store_name }}</h1>
                @php
                    $lastStore = $cart->store->id;
                @endphp
            @endif

        @endforeach


    @endif --}}
</div>

@endsection
