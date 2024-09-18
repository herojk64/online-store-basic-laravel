<x-layout>
    <section class="container my-5">
        <div class="row">
            <!-- Product Details -->
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p><strong>Rating:</strong> {{ $product->bayesianRating() }}</p>
                <p><strong>Price:</strong> Rs. {{ $product->price }}</p>
                <p><strong>In Stock:</strong> {{ $product->stock }} units</p>

                <p>
                    Rate:
                    <livewire:rate-product :product="$product"/>
                </p>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" max="{{ $product->stock }}" value="1" required>
                        @if($errors->has('quantity'))
                            <div class="text-danger">{{ $errors->first('quantity') }}</div>
                        @endif
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
