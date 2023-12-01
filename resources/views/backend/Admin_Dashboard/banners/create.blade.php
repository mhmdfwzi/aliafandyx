@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('banners_trans.Create_Banner') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('banners_trans.Create_Banner') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('banners_trans.Create_Banner') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('banners_trans.Banners') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{ Route('admin.banners.store') }}"
                    autocomplete="off">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('banners_trans.Banner_Name') }}"
                                    name="banner_name" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="active">{{ trans('banners_trans.Status') }}<span
                                        class="text-danger">*</span></label>

                                <select name="active" id="active" class="custom-select mr-sm-2">
                                    <option value="1">
                                        {{ trans('banners_trans.Active') }}
                                    </option>
                                    <option value="0">
                                        {{ trans('banners_trans.Inactive') }}
                                    </option>
                                </select>
                                @error('active')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>




                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="banner_type">{{ trans('banners_trans.Banner_Type') }}<span
                                        class="text-danger">*</span></label>

                                <select name="banner_type" id="banner_type" class="custom-select mr-sm-2">
                                    <option value="main_banner">
                                        {{ trans('banners_trans.Main_Banner') }}
                                    </option>
                                    <option value="product_banner">
                                        {{ trans('banners_trans.Product_Banner') }}
                                    </option>
                                    <option value="offer_banner">
                                        {{ trans('banners_trans.Offer_Banner') }}
                                    </option>
                                </select>
                                @error('banner_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('banners_trans.Banner_Title') }}" name="title"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('banners_trans.Banner_Sub_Title') }}"
                                    name="sub_title" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('banners_trans.Offer') }}" name="offer"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('banners_trans.Offer_Title') }}"
                                    name="offer_title" class="form-control" />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="direction: ltr">
                                <textarea id="summernote" name="content"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="message" name="content">
                                    {{ old('content') }}
                                </textarea>
                            </div>
                        </div>
                    </div>



                    <div class="row">

                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('banners_trans.Image') }}<span class="text-danger">*</span></label>
                                <div class="avatar-img">

                                    <input onchange="preview()" type="file" name="image" accept="image/*"
                                        id="upload-photo" />
                                </div>
                                @error('image')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-lg text-center p-3">
                                <img src="{{ asset('backend/assets/images/profile-avatar.jpg') }}" height="200"
                                    width="200" class="img-fluid" id="frame" />
                            </div>
                        </div>
                    </div>






                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('banners_trans.Add') }}</button>


                </form>




            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Hello ..!',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'video']],
            ['view', ['codeview', 'help']]
        ]
    });
</script>
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection