<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $products = Product::latest()->take(10)->get(); // Fetch 10 latest products for display

        // Get popular products sorted by Bayesian rating and limit the results
        $popularProducts = Product::with('ratings')->get()->sortByDesc(function ($product) {
            return $product->bayesianRating();
        })->take(4); // Limit popular products to 4

        return view('welcome', compact('products', 'popularProducts'));
    }
}
