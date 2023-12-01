<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreBannerRequest;
use App\Http\Requests\Backend\UpdateBannerRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use UploadImageTrait;

    public function __construct()
    {
        $this->authorizeResource(Banner::class,'banner');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::all();

        return view('backend.Admin_Dashboard.banners.index',compact('banners'));

        //  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.Admin_Dashboard.banners.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();

        // Extract data excluding the 'image' field
        $data = $request->except('image');

        // Upload the image and add its path to the data
        $data['image'] = $this->ProcessImage($request, 'image', 'banners',600,600);

        // Create the banner with the validated and modified data
        Banner::create($data); 

        return redirect()->route('admin.banners.index')->with('toast_success','Banner Created Successfully');;
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
        $banner = Banner::findOrFail($id);
        return view('backend.Admin_Dashboard.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        //


        // Validate the request data
        $validatedData = $request->validated();
        
        $banner = Banner::findOrFail($id);
        
        $data = $request->except('image');

        $data['image'] = $this->ProcessImage($request, 'image', 'banners' ,600,600, $banner->image);

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('toast_success','Banner Updated Successfully');;

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
    }
}