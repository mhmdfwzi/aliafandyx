<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tag;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    use UploadImageTrait;
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $this->authorize('viewAny',Product::class);
        // dd($this->authorize('viewAny',Product::class));
        $products = Product::with(['category', 'store', 'brand'])
            ->withCount([
                'product_variants' => function ($query) {
                    return $query;
                }
            ])
			->latest()
            ->get();
        // SELECT * FROM products
        // SELECT * FROM categories WHERE id IN (...)
        // SELECT * FROM stores WHERE id IN (....)


        return view('backend.Vendor_Dashboard.products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $vendor = Vendor::where('id', Auth::user('vendor')->id)->first();
        $store = Store::where('id', $vendor->store_id)->first();
        //$categories = Category::all();
        $categories = $store->categories;
       
        $brands = Brand::all();
        $attributes = Attribute::all();
        return view(
            'backend.Vendor_Dashboard.products.create',
            compact('categories', 'store', 'brands', 'attributes')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $request->validated();

        // Merge 'slug' input into the current request's input array
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        // get requst input array without [image , tags]
        $data = $request->except('image', 'tags');

        // add 'image' to the input array $data
        //$data['image'] = $this->uploadImage($request, 'image', 'products');
        $data['image'] = $this->ProcessImage($request, 'image', 'products');

        // dd($data);
        // create product model with the $data array
        $product = Product::create($data);

        // get tags from the request 
        /*
        $tags = json_decode($request->post('tags'));
        $tag_ids = [];
        // get all tags from DB
        $saved_tags = Tag::all();
        // loop on tags that we get from request 
        foreach ($tags as $item) {
            // create slug from this tags
            $slug = Str::slug($item->value);
            $tag = $saved_tags->where('slug', $slug)->first();
            if (!$tag) {
                $tag = Tag::create([
                    'name' => $item->value,
                    'slug' => $slug
                ]);
            }
            $tag_ids[] = $tag->id;
        }

        $product->tags()->sync($tag_ids);
*/
        return redirect()->route('vendor.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $product = Product::findOrFail($id);

        return view('backend.Vendor_Dashboard.products.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $product = Product::findOrFail($id);
        $vendor = Vendor::where('id', Auth::user('vendor')->id)->first();
        $store = Store::where('id', $vendor->store_id)->first();
        $categories = $store->categories;
        $brands = Brand::all();
        $attributes = Attribute::all();
        $tags = implode(',', $product->tags()->pluck('name')->toArray());



        return view('backend.Vendor_Dashboard.products.edit', compact(
            'tags',
            'product',
            'categories',
            'store',
            'brands',
            'attributes'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validated();

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);
        // get product old image
        //$old_image = $product->image;
        $current_image = $product->image;
        $data = $request->except('image', 'tags');
       // $new_image = $this->uploadImage($request, 'image', 'products');
       $new_image = $this->ProcessImage($request, 'image', 'products', $current_image);
       
        // dd($new_image);
        if ($new_image) {
            $data['image'] = $new_image;
        }
        $product->update($data);
       
/*
        $tags = json_decode($request->post('tags'));
        $tag_ids = [];
        $saved_tags = Tag::all();
        if ($tags) {
            foreach ($tags as $item) {
                $slug = Str::slug($item->value);
                $tag = $saved_tags->where('slug', $slug)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item->value,
                        'slug' => $slug
                    ]);
                }
                $tag_ids[] = $tag->id;
            }
        }

        $product->tags()->sync($tag_ids);

*/
        // $product->tags()->attach($tag_ids);
        // $product->tags()->detach($tag_ids);
        // $product->tags()->syncWithoutDetaching($tag_ids);

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::findOrFail($id);
        return redirect()->route('admin.products.index');
    }


    public function add_variant($id)
    {
        $attributes = Attribute::all();
        $product = Product::findOrFail($id);

        return view(
            'backend.Vendor_Dashboard.products.product_variant',
            compact('attributes', 'product')
        );
    }
}
