<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'You must be logged in to add items to the cart');
        }
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');

        if ($quantity > $product->stock) {
            return back()->withErrors(['quantity' => 'Not enough stock available']);
        }

        // Check if the product is already in the cart
        $cartItem = Cart::where('product_id', $product->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($cartItem) {
            // Update the quantity if the item is already in the cart
            $cartItem->quantity = $quantity;
            $cartItem->save();
        } else {
            // Add a new item to the cart
            Cart::create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'user_id' => auth()->id(),
            ]);
        }

        // Update product stock
        $product->stock -= $quantity;
        $product->save();

        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
        ]);

        Cart::where('id', $request->cart_id)->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}
