<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Livewire\Component;

class ProductSearch extends Component
{

    public $selected = '';
    // public $selectedCategory = '';
    
    public $search = '';


    public $products;
    public $selectedProduct;

   

    public function mount()
    {
        
        $this->products = Product::all();
    }


    public function render()
    {
        $providers = Provider::all();
        // $categories= Category::all();

        
        
        return view('livewire.product-search', [
            'providers' => $providers,
            // 'categories' => $categories,
        ]);
    }
}
