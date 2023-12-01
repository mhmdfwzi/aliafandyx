<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\{
    Attribute,
    Brand,
    Category,
    Product,
    Store,
    Tag
};

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    use UploadImageTrait;

    public function __construct()
    {
        $this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* comments
        - $this->authorize('viewAny',Product::class);
        - dd($this->authorize('viewAny',Product::class));
        // SELECT * FROM products
        // SELECT * FROM categories WHERE id IN (...)
        // SELECT * FROM stores WHERE id IN (....)
         */

        $this->authorize('viewAny',Product::class);

        $products = Product::with(['category', 'store', 'brand'])
        ->withCount([
            'product_variants' => function ($query) {
                return $query;
            }
        ])->get();



        return view('backend.Admin_Dashboard.products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Product::class);

        $categories = Category::all();
        $stores = Store::all();
        $brands = Brand::all();
        $attributes = Attribute::all();
        return view(
            'backend.Admin_Dashboard.products.create',
            compact('categories', 'stores', 'brands', 'attributes')
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
        

        $this->authorize('create',Product::class);
        
        $request->validated();

        // Merge 'slug' input into the current request's input array
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        // get request input array without [image , tags]
        $data = $request->except('image', 'tags');

        // add 'image' to the input array $data
        $data['image'] = $this->uploadImage($request, 'image', 'products');

        // dd($data);
        // create product model with the $data array
        $product = Product::create($data);

        // get tags from the request
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

        return redirect()->route('admin.products.index');


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
        $this->authorize('view',Product::class);

        $product = Product::findOrFail($id);

        return view('backend.Admin_Dashboard.products.edit');
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
        $this->authorize('update',Product::class);

        $product = Product::findOrFail($id);
        $categories = Category::all();
        $stores = Store::all();
        $brands = Brand::all();
        $attributes = Attribute::all();
        $tags = implode(',', $product->tags()->pluck('name')->toArray());



        return view('backend.Admin_Dashboard.products.edit', compact(
            'tags',
            'product',
            'categories',
            'stores',
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
        $this->authorize('update',Product::class);

        $request->validated();

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);
        // get product old image
        $old_image = $product->image;
        $data = $request->except('image', 'tags');
        $new_image = $this->uploadImage($request, 'image', 'products');
        // dd($new_image);
        if ($new_image) {
            $data['image'] = $new_image;
        }
        $product->update($data);
        // isset => Determine if a variable is declared and is different than NULL
        if ($old_image && $new_image) {
            // Storage::disk('disk_name')->delete('image_path');
            Storage::disk('uploads')->delete($old_image);
        }

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
        $this->authorize('delete',Product::class);
        Product::findOrFail($id);
        return redirect()->route('admin.products.index');
    }


    public function add_variant($id)
    {
        $this->authorize('create',Product::class);

        $attributes = Attribute::all();
        $product = Product::findOrFail($id);

        return view(
            'backend.Admin_Dashboard.products.product_variant',
            compact('attributes', 'product')
        );
    }
}
