<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopGridController extends Controller
{
    public function index($category_id = null)
    {

        $categories = Category::all();
        $brands = Brand::all();

        if ($category_id == null) {
            $products = Product::where('status', 'active')->paginate(6);
        } else {
            $products = Product::where('status', 'active')
                ->where('category_id', $category_id)
                ->paginate(6);
        }

        return view('frontend.pages.shop_grid', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
            'category_id' => $category_id
        ]);
    }

    public function reset_filters()
    {
        $products = Product::where('status', 'active')->paginate(12);
        return view('frontend.pages.show_products', compact('products'));
    }


    public function all_filters(Request $request)
    {

        $query = Product::where('status', 'active');

        // Apply category filter
        if ($request->has('category')) {
            // dd($request);

            $categories = $request->input('category');
            $query->whereIn('category_id', $categories);
        }

        // Apply brand filter
        if ($request->has('brand')) {
            $brands = $request->input('brand');
            $query->whereIn('brand_id', $brands);
        }

        // Apply price range filter
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Apply search filter
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        if ($request->has('sort')) {
            if ($request->sort == "Low Price") {
                $query->where('status', 'active')->orderBy('price', 'ASC')->paginate(12);
            } elseif ($request->sort == "High Price") {
                $query->where('status', 'active')->orderBy('price', 'DESC')->paginate(12);
            } elseif ($request->sort == "A - Z Order") {
                $query->where('status', 'active')->orderBy('name', 'ASC')->paginate(12);
            } else {
                $query->where('status', 'active');
            }
        }

        $categoryParam = $request->input('category');


        $products = $query->with(['category', 'store'])->paginate(6);

        if (request()->ajax()) {
            return response()->json([
                'products' => $products,
                'pagination_links' => $products->appends([
                    'category' => $categoryParam
                ])->links()->toHtml(),
            ]);
        }
        return response()->json([
            'products' => $products,
            'pagination_links' => $products->appends(['category' => $categoryParam])->links()->toHtml(),
        ]);
    }
}
