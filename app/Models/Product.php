<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderDetails()
    {
        $this->hasMany(OrderDetail::class,'product_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id');
    }

    public function averageRating()
    {
        return round($this->ratings()->avg('rating'), 1) ?? 0;
    }

    public function bayesianRating()
    {
        $globalAverageRating = Rating::avg('rating') ?? 0;  // Global average rating, default to 0 if no ratings
        $minimumRatingsForReliability = 5; // Minimum number of ratings required to be considered reliable
        $productAverageRating = $this->averageRating(); // Average rating for this specific product
        $productRatingCount = $this->ratings()->count(); // Number of ratings this product has

        // If there are no ratings, return 0
        if ($productRatingCount === 0) {
            return 0;
        }

        // Bayesian formula
        $bayesianScore = ($productRatingCount / ($productRatingCount + $minimumRatingsForReliability)) * $productAverageRating
            + ($minimumRatingsForReliability / ($productRatingCount + $minimumRatingsForReliability)) * $globalAverageRating;

        return round($bayesianScore, 1);
    }
}
