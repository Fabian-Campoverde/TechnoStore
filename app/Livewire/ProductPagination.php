<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPagination extends Component
{
    use WithPagination;
    public $searchTerm = '';
    public $selectedCategories = [];

    public function search()
    {

    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }
    public function render()
    {
        // $products = Product::where(function ($query) {
        //     $query->where('nombre', 'like', '%' . $this->searchTerm . '%')
        //           ->orWhere('codigoId', 'like', '%' . $this->searchTerm . '%');
        // })
        // ->when(count($this->selectedRoles), function ($query) {
        //     $query->whereHas('category', function ($subquery) {
        //         $subquery->whereIn('category.id', $this->selectedRoles);
        //     });
        // })
        // ->paginate();
        $products = Product::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('codigoId', 'like', '%' . $this->searchTerm . '%');
        })
        ->when(count($this->selectedCategories), function ($query) {
            $query->whereIn('category_id', $this->selectedCategories);
        })
        ->paginate();
        
        $categories= Category::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $productCount = Product::where('category_id', $category->id)->count();
            $category->productCount = $productCount;
            return $category;
        });
        return view('livewire.product-pagination',compact('products',"categoriesWithCount"));
    }
    public function filterCategories()
{
    $this->resetPage();
}
}
