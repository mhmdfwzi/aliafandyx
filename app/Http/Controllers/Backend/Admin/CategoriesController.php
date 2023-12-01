<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        // $categories = Category::all(); //Return collection object , return all data
        // //$categories->first(); =>  $categories[0];
        
        $categories = Category::with('parent')
        // ->select('categories.*')
        // ->selectRaw('(SELECT COUNT(*) FROM products WHERE category_id = categories.id) as products_count')
        ->withCount([
            'products' => function($query){
                $query->where('status','=','active');
            }
        ])
        // ->withCount('products')
        ->get();


        return view('backend.Admin_Dashboard.categories.index',compact('categories'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parents = Category::all();

        return view('backend.Admin_Dashboard.categories.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $request->validated();

        // Request Merge
        $request->merge([
            'slug'=>Str::slug($request->post('name'))
        ]);

        $data = $request->except('image');

        $data['image'] = $this->ProcessImage($request,'image','categories');
      //$data['image'] = $this->ProcessImage($request, 'image', 'products');
        
        Category::create($data);

        // PRG
        return redirect()->route('admin.categories.create');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('backend.Admin_Dashboard.categories.show',[
            'category'=>$category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        // Select * FROM categories WHERE id <> $id 
        // AND (parent_id IS NUll or parent_id <> $id)
        // <> mean right side not equal left side
        $parents = Category::where('id','<>',$id)
        ->where(function($query) use ($id){
            $query->whereNull('parent_id')->orwhere('parent_id','<>',$id);
        })->get();

        return view('backend.Admin_Dashboard.categories.edit',compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        //
        $request->validated();

        $category = Category::findOrFail($id);

        $old_image = $category->image;

        $data = $request->except('image');

        //$new_image = $this->uploadImage($request,'image','categories');
  $new_image = $this->ProcessImage($request,'image','categories');
        if ($new_image) {
            $data['image'] = $new_image;
        }

        $category->update($data);

        // isset => Determine if a variable is declared and is different than NULL
        if($old_image && $new_image){
            // Storage::disk('disk_name')->delete('image_path');
            Storage::disk('uploads')->delete($old_image);
        }

        return redirect()->route('admin.categories.index');

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

        $category = Category::findOrFail($id);
        $category->delete();

        // if($category->image){
        //     Storage::disk('uploads')->delete($category->image);
        // }

        return redirect()->route('backend.categories.index');

    }

    public function trash(){

        $categories = Category::onlyTrashed()->get();

        return view('backend.Admin_Dashboard.categories.trash',compact('categories'));

    }


    public function restore($id){

        $category = Category::onlyTrashed()->findOrFail($id);

        $category->restore();

        return redirect()->route('backend.categories.index');        

    }


    public function forceDelete($id){

        $category = Category::onlyTrashed()->findOrFail($id);

        $category->forceDelete();

        return redirect()->route('backend.categories.index');        

    }


    // // custom function to upload images
    // protected function uploadImage(Request $request){
    //     // check if input of type 'file' with name 'image' is exist or not
    //     if(!$request->hasFile('image')){
    //         return;
    //     }
    //         $file = $request->file('image'); // UploadedFile Object
    //         // $file->store('folder_name','disk_name'[default=>'local'] );
    //         $path = $file->store('categories',[
    //             'disk'=>'uploads'
    //         ]);
    //         return  $path;
        
    // }
}
