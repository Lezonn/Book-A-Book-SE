<link rel="stylesheet" href="/css/marketplace/profile.css">
@extends('marketplace.layouts.main')

@section('container')
<section>
    <div class="container mt-5 mb-5">
    <h1>My Profile</h1>
        <div class="row">
            <div class="col-lg-4 offset-2">
                <img src="{{ asset('images/profile/profile.png') }}" alt="">
            </div>
            <div class="col-lg-4">
                <div class="mt-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" disabled id="name">
                </div>
                <div class="mt-3">
                    <label for="phone-number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" value="{{ $user->phone_number }}" disabled id="phone-number">
                </div>
                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" disabled id="email">
                </div>
                <div class="mt-3">
                    <label for="bopay-balance" class="form-label">Bopay Balance</label>
                    <input type="text" class="form-control" value="{{ 25000000 }}" disabled id="email">
                </div>

                <div class="mt-3">
                    <a href="/profile/transactions">
                        <button class="btn btn-dark btn-transaction">View transaction</button>
                    </a>
                </div>


            </div>
        </div>
    </div>
</section>

@endsection
