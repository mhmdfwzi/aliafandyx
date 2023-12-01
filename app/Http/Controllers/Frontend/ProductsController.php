<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index(){

    }

    // show product details
    
    public function show(Product $product){

        $main_categories = Category::where('status','=','active')-> where('parent_id', '=', null)->get();
        $sup_categories = Category::where('status','=','active')-> where('parent_id','!=','null')->get();


 
        $products =  Product::where('category_id', '=', $product->category_id)->get();
        $reviews = Review::where('product_id', $product->id)->get();

        //$product_variants = ProductVariant::all();

        $product_sizes = ProductVariant::where('product_id', '=', $product->id)
        ->where('attribute_id', '=', 1)  
        ->get();

        $shose_sizes = ProductVariant::where('product_id', '=', $product->id)
        ->where('attribute_id', '=', 5)
        ->get();
        
        $product_colors = ProductVariant::where('product_id', '=', $product->id)
        ->where('attribute_id', '=', 2)
        ->get();

        $product_pics = ProductVariant::where('product_id', '=', $product->id)
        ->where('attribute_id', '=', 3)
        ->get();

        $product_kamons = ProductVariant::where('product_id', '=', $product->id)
        ->where('attribute_id', '=', 4)
        ->get();

        if($product->status != 'active'){
            abort(404);
        }
        return view('frontend.pages.product_details',compact('product','reviews','main_categories',
        'sup_categories','product_sizes','product_colors','product_pics','product_kamons','shose_sizes','products'));
    }

    public function productAutocomplete(Request $request){
        $term = $request->input('term');

        $products = Product::where('name', 'LIKE', '%' . $term . '%')
            ->select('name', 'id' ,'slug','image') // Select both name and id
            ->get(); // Retrieve the matching customers

        return response()->json($products);
    }
}
