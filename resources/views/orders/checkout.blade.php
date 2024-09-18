<x-layout>
    <section class="container my-5">
        <h2 class="text-center mb-4">Checkout</h2>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <h4>Shipping Information</h4>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="postcode" class="form-label">Postcode</label>
                        <input type="text" name="postcode" id="postcode" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Order Summary</h4>
                    @foreach ($cartItems as $item)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $item->product->name }}</span>
                            <span>${{ $item->product->price }} x {{ $item->quantity }}</span>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>${{ $totalPrice }}</strong>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Place Order</button>
                </div>
            </div>
        </form>
    </section>
</x-layout>
