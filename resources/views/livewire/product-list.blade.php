<div>
    <!-- Filter and Search Form -->
    <div class="mb-4">
        <input type="text" wire:model.lazy="search" class="form-control" placeholder="Search products...">

        <div class="mt-2">
            <h5>Categories</h5>
            <div class="row gap-3">
            @foreach($categories as $category)
                <div class="form-check col">
                    <input
                        type="checkbox"
                        wire:model.lazy="selectedCategories"
                        value="{{ $category->id }}"
                        id="category-{{ $category->id }}"
                        class="form-check-input"
                    >
                    <label class="form-check-label" for="category-{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <!-- Products List -->
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <x-partials._card :product="$product" />
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No products found.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {!!   $products->links() !!}
    </div>
</div>
