<?php

namespace App\Livewire;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RateProduct extends Component
{
    public $product;
    public $rating = 0;

    public function mount($product)
    {
        // Fetch existing rating if the user has rated this product
        $existingRating = Rating::where('product_id', $this->product->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingRating) {
            $this->rating = $existingRating->rating;
        }
    }

    public function rate($value)
    {
        $this->rating = $value;

        // Update or create rating for the product by the user
        Rating::updateOrCreate(
            [
                'product_id' => $this->product->id,
                'user_id' => auth()->user()->id,
            ],
            [
                'rating' => $this->rating,
            ]
        );

        // You can dispatch an event or a notification if needed
        session()->flash('message', 'Your rating has been saved!');
    }

    public function render()
    {
        return view('livewire.rate-product');
    }
}
