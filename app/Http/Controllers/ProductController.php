<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        // Fetch all products
        $products = Product::all();

        // Return the view with products
        return view('products.index', compact('products'));
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Return the view with product details
        return view('products.show', compact('product'));
    }
}
