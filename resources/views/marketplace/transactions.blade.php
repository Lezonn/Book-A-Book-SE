<link rel="stylesheet" href="/css/marketplace/transactions.css">
@extends('marketplace.layouts.main')

@section('container')

<div class="container mt-4 mb-4">
    <center>
        <h1>My Transaction</h1>
    </center>

    @if($transactionAvailable == "0")
        <div class="empty">
            <h3>Your have no transaction yet!</h3>
        </div>
    @endif

    @foreach ($transactions as $tr)
        <div class="box">
            <div class="row">
                <div class="col-md-6">
                    @foreach ($tr["books"] as $book)
                        <div class="detail">
                            <div style="width: 75px">
                                {{ $book->pivot->qty }} pcs
                            </div>
                            <div>
                                {{ $book->title }}
                            </div>

                        </div>
                    @endforeach
                    <div class="price">
                        Rp. {{ $tr->total_price }}
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="store">
                        {{ $tr->store->store_name }}
                    </div>
                    <div class="date">
                        Transaction Date : {{ date('d-m-Y', strtotime($tr->created_at)); }}
                    </div>
                </div>
            </div>
        </div>


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
