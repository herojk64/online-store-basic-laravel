<!-- resources/views/components/partials/_card.blade.php -->
@props([
    'product' => null,
])

<div class="card h-100">
    <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 200px;">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
        <p class="card-text mb-2"><strong>Rating: </strong>{{ $product->bayesianRating() }}</p>
        <p class="card-text mb-2"><strong>Rs. {{ $product->price }}</strong></p>
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary mt-auto">View Product</a>
    </div>
</div>
