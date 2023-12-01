<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShowProducts extends Component
{
    protected $products;

    public $brands, $selectedCategory, $categories, $brandInputs = [];

    public $orderBy = "Select Order";

    protected $queryString = ['brandInputs', 'orderBy', 'selectedCategory'];




    public function mount($brands, $categories)
    {

        $this->brands = $brands;
        $this->categories = $categories;
    }


    public function changeOrderBy($order)
    {

        $this->orderBy = $order;
    }

    public function changeCategory($category)
    {

        $this->selectedCategory = $category;
    }


    protected $listeners = ['product' => 'incrementPostCount'];
 
    public function incrementPostCount()
    {
       return redirect()->route('home');
    }

    public function render()
    {

        if ($this->orderBy == "Low Price") {
            $products = Product::orderBy('price', 'ASC')->paginate(12);
            // dd($products);
        } else if ($this->orderBy == "High Price") {
            $products = Product::orderBy('price', 'DESC')->paginate(12);
        } else if ($this->orderBy == "A - Z Order") {
            $products = Product::orderBy('name', 'ASC')->paginate(12);
        } else {

            $products = Product::where('status', 'active')
                // ->where('category_id', '=', $this->selectedCategory)
                ->when($this->brandInputs, function ($p) {
                    $p->whereIn('brand_id', $this->brandInputs);
                })
                ->paginate(12);
        }





        return view('livewire.show-products', [
            'products' => $products
        ]);
    }
}
