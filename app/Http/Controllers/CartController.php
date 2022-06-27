<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Store;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $stores = Store::all();

        $carts = Cart::where('user_id', $user->id)
                    ->orderBy('store_id', 'asc')
                    ->get();

        foreach($stores as $store) {
            $temp = [];
            foreach($carts as $cart) {
                if($cart->store_id == $store->id) {
                    $cart->book["qty"] = $cart->qty;
                    array_push($temp, $cart->book);
                }
            }

            $store["books"] = $temp;
        }

        $cartAvailable = $carts->isEmpty() ? "0" : "1";

        return view('marketplace.cart', [
            'stores' => $stores,
            'cartAvailable' => $cartAvailable
        ]);
    }

    public function store(Request $request)
    {

        $user = auth()->user();

        $validatedData = $request->validate([
            'qty' => 'required|max:100|min:1',
            'book_id' => 'required',
            'store_id' => 'required'
        ]);

        $validatedData['user_id'] = $user->id;

        $book = Cart::where('book_id', $request->book_id)
                        ->where('user_id', $user->id)
                        ->first();

        if($book != null) {
            CartController::update($validatedData);
            return redirect()->back()->with('success', 'Cart has been updated!');
        }

        Cart::create($validatedData);

        return redirect()->back()->with('success', 'Book has been added to cart!');
    }

    public function update($validatedData)
    {
        Cart::where('book_id', $validatedData['book_id'])
                ->where('user_id', $validatedData['user_id'])
                ->update($validatedData);
    }

    public function checkout(Request $request) {
        $user = auth()->user();

        $carts = Cart::where('user_id', $user->id)
                    ->where('store_id', $request->store_id)
                    ->get();

        // dd($cart);

        foreach($carts as $cart) {
            if(!$cart->book || $cart->book->stock < $cart->qty) {
                return redirect('/cart')->with('error', $cart->book->title . ' stock is not enough');
            }
        }

        DB::transaction(function() use ($carts, $user, $request) {
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'store_id' => $request->store_id,
                'total_price' => $request->total_price
            ]);

            foreach($carts as $cartBook) {
                $transaction->books()->attach($cartBook->book_id, [
                    'qty' => $cartBook->qty
                ]);

                Book::find($cartBook->book_id)->decrement('stock', $cartBook->qty);

            }

            Cart::where('user_id', $user->id)
                    ->where('store_id', $request->store_id)
                    ->delete();

            });

        $store = Store::where('id', $request->store_id)->first();
        return redirect('/stores/' . $store->slug)->with('success', 'Cart has been successfully checkout');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
