<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategories = [];
    public $categories;

    public function mount()
    {
        // Load all categories on mount
        $this->categories = Category::all();
    }

    public function updatedSearch()
    {
        // Reset pagination when the search term changes
        $this->resetPage();
    }

    public function updatedSelectedCategories()
    {
        // Reset pagination when selected categories change
        $this->resetPage();
    }

    public function filterByCategory($categoryId)
    {
        if (in_array($categoryId, $this->selectedCategories)) {
            // Remove category if unchecked
            $this->selectedCategories = array_diff($this->selectedCategories, [$categoryId]);
        } else {
            // Add category if checked
            $this->selectedCategories[] = $categoryId;
        }
    }

    public function getProductsProperty()
    {
        return Product::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->when(count($this->selectedCategories), function ($query) {
            $query->whereIn('category_id', $this->selectedCategories);
        })->paginate(12); // Adjust the number of items per page as needed
    }

    public function render()
    {
        return view('livewire.product-list', [
            'products' => $this->products,
            'categories' => $this->categories,
        ]);
    }
}
