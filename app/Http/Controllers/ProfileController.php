<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('marketplace.profile', [
            'user' => auth()->user()
        ]);
    }

    public function transactions() {
        $user = auth()->user();

        $transactions = Transaction::where('user_id', $user->id)
                        ->get();

        $transactionAvailable = $transactions->isEmpty() ? "0" : "1";
        return view('marketplace.transactions', [
            'transactions' => $transactions,
            'transactionAvailable' => $transactionAvailable
        ]);
    }
}
