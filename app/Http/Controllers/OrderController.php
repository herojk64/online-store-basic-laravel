<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch cart items for the logged-in user
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('orders.checkout', compact('cartItems', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->get();

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Create a new order
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => auth()->user()->name,
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'total_amount' => $totalAmount
        ]);

        // Move cart items to order details and clear the cart
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            $order->orderDetails()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }
        $cartItems->each->delete(); // Clear the cart

        return redirect()->route('checkout.index')->with('success', 'Your order has been placed!');
    }
}
