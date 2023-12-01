<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Currency;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ShopGridController extends Controller
{
    private $productPerPage = 21;

    public function index(Request $request, $category_id = null)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $stores = Store::all();

        $products_category = $this->getFilteredProducts($request, $category_id);


        return view('frontend.pages.shop_grid', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products_category,
            'stores'=>$stores,
            'category_id' => $category_id,
            'store_id'=>null,
        ]);
    }

    public function indexStore(Request $request, $store_id = null)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $stores = Store::all();

        $products_store = $this->getFilteredProductsStore($request, $store_id);


        return view('frontend.pages.shop_grid', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products_store,
            'stores'=>$stores,
            'store_id' => $store_id,
            'category_id'=>null,
        ]);
    }


    public function reset_filters()
    {
        return redirect()->route('shop-grid.index');
    }

    public function all_filters(Request $request)
    {
        $products = $this->getFilteredProducts($request);

        if ($request->ajax()) {
            // dd($products->sale_percent);
            return response()->json([
                'products' => $products,
                'pagination_links' => $products->appends($request->query())->links()->toHtml(),
            ]);
        }

        return response()->json([
            'products' => $products,
            'pagination_links' => $products->appends($request->query())->links()->toHtml(),
        ]);
    }



    private function getFilteredProducts(Request $request, $category_id = null)
    {
        $query = Product::where('status', 'active')->orderBy('id', 'desc');

        

        if ($category_id !== null) {
            $query->where('category_id', $category_id);
        }

        if ($request->has('category')) {

            $categories = $request->input('category');
            $query->whereIn('category_id', $categories);
        }

        if ($request->has('store')) {
            $stores = $request->input('store');
            $query->whereIn('store_id', $stores);
        }



        if ($request->has('brand')) {
            $brands = $request->input('brand');
            $query->whereIn('brand_id', $brands);
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'Low Price':
                    $query->orderBy('price', 'ASC');
                    break;
                case 'High Price':
                    $query->orderBy('price', 'DESC');
                    break;
                case 'A - Z Order':
                    $query->orderBy('name', 'ASC');
                    break;
            }
        }

        $products = $query->with(['category', 'store'])->paginate($this->productPerPage);

        // Calculate and append the sale_percent attribute to each product
        $products->getCollection()->each(function ($product) {
            $product->sale_percent = $product->salePercent;
            $product->formatted_price = Currency::format($product->price);
            $product->formatted_compare_price = $product->compare_price ? Currency::format($product->compare_price) : null;
        });

        return $products;
    }



    private function getFilteredProductsStore(Request $request, $store_id = null)
    {
        $query = Product::where('status', 'active')->orderBy('id', 'desc');

        
        if ($store_id !== null) {
            $query->where('store_id', $store_id);
        }

        if ($request->has('category')) {

            $categories = $request->input('category');
            $query->whereIn('category_id', $categories);
        }

        if ($request->has('store')) {
            $stores = $request->input('store');
            $query->whereIn('store_id', $stores);
        }



        if ($request->has('brand')) {
            $brands = $request->input('brand');
            $query->whereIn('brand_id', $brands);
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'Low Price':
                    $query->orderBy('price', 'ASC');
                    break;
                case 'High Price':
                    $query->orderBy('price', 'DESC');
                    break;
                case 'A - Z Order':
                    $query->orderBy('name', 'ASC');
                    break;
            }
        }

        $products = $query->with(['category', 'store'])->paginate($this->productPerPage);

        // Calculate and append the sale_percent attribute to each product
        $products->getCollection()->each(function ($product) {
            $product->sale_percent = $product->salePercent;
            $product->formatted_price = Currency::format($product->price);
            $product->formatted_compare_price = $product->compare_price ? Currency::format($product->compare_price) : null;
        });

        return $products;
    }

}