@extends('backend.layouts.master')
@section('css')
    <link href="{{ URL::asset('backend/assets/tagify/tagify.css') }}" rel="stylesheet">

@section('title')
    {{ trans('products_trans.Create_Product') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('products_trans.Create_Product') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('products_trans.Create_Product') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('products_trans.Products') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection


@section('content')

<x-backend.alert />

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form method="post" enctype="multipart/form-data" action="{{ Route('admin.products.store') }}"
                    autocomplete="off">

                    @csrf


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('products_trans.Name') }}" name="name"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('products_trans.Brand_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="brand_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('products_trans.Choose') }}</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('products_trans.Category_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="category_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('products_trans.Choose') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('products_trans.Store_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="store_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('products_trans.Choose') }}</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('products_trans.Product_Type') }} <span
                                        class="text-danger">*</span></label>
                                <select name="product_type" id="" class="custom-select mr-sm-2">
                                    <option value="" selected>{{ trans('products_trans.Choose') }}</option>

                                    <option value="normal">Normal</option>
                                    <option value="best_seller">Best Seller</option>
                                    <option value="new_arrival">New Arrival</option>
                                    <option value="top_rated">Top Rated</option>
                                    <option value="other">Other</option>

                                </select>
                                @error('product_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}



                    </div>

                    {{-- price and compare_price --}}
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('products_trans.Price') }}" name="price"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('products_trans.Compare_Price') }}"
                                    name="compare_price" class="form-control" />
                            </div>
                        </div>

                    </div>




                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('products_trans.Tags') }}" name="tags" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('products_trans.Quantity') }}" name="quantity"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea id="summernote" name="description"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="message" name="content" required="">
                                    {{-- {{ old('content') }} --}}
                                </textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('products_trans.Status') }}<span class="text-danger">*</span></label>


                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active">
                                    <label class="form-check-label">
                                        {{ trans('products_trans.Active') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="draft"
                                        checked>
                                    <label class="form-check-label">
                                        {{ trans('products_trans.Draft') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="archived"
                                        checked>
                                    <label class="form-check-label">
                                        {{ trans('products_trans.Archived') }}
                                    </label>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>{{ trans('products_trans.Featured') }}
                                            <span class="text-danger">*</span> : </label>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="featured"
                                                value="1">
                                            <label class="form-check-label">
                                                {{ trans('products_trans.Featured') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="featured"
                                                value="0" checked>
                                            <label class="form-check-label">
                                                {{ trans('products_trans.Not_Featured') }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                @error('featured')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>



                    {{-- Image input --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('products_trans.Image') }}<span class="text-danger">*</span></label>
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
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('products_trans.Add') }}</button>


                </form>

            </div>
        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')
{{-- Tagify --}}
<script src="{{ asset('backend/assets/tagify/tagify.js') }}"></script>
<script src="{{ asset('backend/assets/tagify/tagify.polyfills.min.js') }}"></script>

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

    var inputElm = document.querySelector('[name=tags]'),
        tagify = new Tagify(inputElm);
</script>

{{-- Color enable & disabled --}}
<script>
    $('input[name="colors_active"]').on('change', function() {
        if ($('input[name="colors_active"]').is(':checked')) {
            $('#colors-selector').prop('disabled', false);
            $('#sku_combination').show();
        } else {
            $('#colors-selector').prop('disabled', true);
            $('#sku_combination').hide();
        }
    });
</script>
@endsection
