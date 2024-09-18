<x-layout>
    <section class="container my-5">
        <!-- Welcome Section -->
        <section class="container my-5 py-5" style="background: linear-gradient(135deg, #f5f5f5 0%, #ffffff 100%); border-radius: 10px;">
            <div class="row align-items-center text-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-3 fw-bold mb-3">Welcome to Our Store</h1>
                    <p class="lead mb-4">Discover a curated selection of the finest products, handpicked just for you. Explore our latest arrivals and popular picks now!</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Shop Now</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/welcome-image.jpg') }}" class="img-fluid rounded shadow-sm" alt="Welcome Image">
                </div>
            </div>
        </section>

        <!-- Popular Products Carousel -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="text-center mb-4">Popular Products</h2>
                <div id="popularProductsCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($popularProducts as $index => $product)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="d-block w-100" style="height: 300px; object-fit: cover;" alt="{{ $product->name }}">
                                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center">
                                        <div class="text-white text-center">
                                            <h5>{{ $product->name }}</h5>
                                            <p>${{ $product->price }}</p>
                                            <p>Rating: {{ $product->bayesianRating() }}</p>
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#popularProductsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#popularProductsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>




        <!-- Product Section -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="text-center mb-4">Some Products</h2>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <x-partials._card :product="$product" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </section>
</x-layout>
