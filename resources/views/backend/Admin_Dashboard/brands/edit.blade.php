@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('brands_trans.Edit_Brand') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('brands_trans.Edit_Brand') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('brands_trans.Edit_Brand') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('brands_trans.Brands') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">


                <form method="post" enctype="multipart/form-data" action="{{Route('admin.brands.update',[$brand->id])}}" autocomplete="off">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('brands_trans.Brand_Name') }}" name="name"
                                :value="$brand->name" class="form-control" />
                                
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-backend.form.textarea 
                                label="{{ trans('brands_trans.Info') }}"
                                name="info" value="{{$brand->info}}" />
                            </div>
                        </div>

                    </div>

           


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{trans('brands_trans.Image')}}<span class="text-danger">*</span></label>
                                <div class="avatar-img">
                                    {{-- <label class="avatar-label circle" for="upload-photo" >+</label>
                                    <img class="avatar" src="{{URL::asset('assets/images/user.png')}}" alt=""> --}}
                                    <input onchange="preview()" type="file" name="image" accept="image/*" id="upload-photo" />
                                </div>
                                @error('image')
                                <p class="alert alert-danger">{{ $message }}</p>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-lg text-center p-3">
                                <img src="{{ $brand->image_url }}" 
                                height="200" width="200"
                                class="img-fluid" id="frame" />
                            </div>
                        </div>
                    </div>
                   






                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('brands_trans.Edit') }}</button>


                </form>




            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection
