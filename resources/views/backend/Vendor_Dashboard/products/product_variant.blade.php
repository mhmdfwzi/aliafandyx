@extends('backend.layouts.master')
@section('css')
    <link href="{{ URL::asset('backend/assets/tagify/tagify.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('title')
    {{ trans('products_trans.Add_Product_Variant') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('products_trans.Add_Product_Variant') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('products_trans.Add_Product_Variant') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('products_trans.Products') }}</li>
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


                <div class="options">
                    <div class="row input-wrapper">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('products_trans.Atrribute') }} <span
                                        class="text-danger">*</span></label>
                                <select name="attribute_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('products_trans.Choose') }}</option>
                                    @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                                @error('attribute_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">

                                {{-- <input type="text" name="value[]" class="form-control" multiple> --}}
                                <label> {{ trans('products_trans.Values') }} <span class="text-danger">*</span></label>
                                <select class="custom-select value-select" name="value[]" multiple="multiple">

                                </select>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_option" class="btn btn-primary btn-sm">Add Option</button>
                        </div>
                    </div>
                </div>

                <div class="preview mt-20">
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 child-repeater-table">
                        <table class="table table-bordered table-responsive" id="table">

                            <thead>
                                <tr>
                                    <th>{{ trans('products_trans.Variant') }}</th>
                                    <th>{{ trans('products_trans.Price') }}</th>
                                    <th>{{ trans('products_trans.Quantity') }}</th>
                                    <th>{{ trans('products_trans.Sku') }}</th>

                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr>

                                    <td>
                                        <input type="text" disabled name="variant[]" class="form-control">


                                        @error('variant')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" name="price[]" class="form-control">
                                        @error('price')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" name="quantity[]" class="form-control">
                                        @error('quantity')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" name="sku[]" class="form-control">
                                        @error('sku')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </td>

                                </tr>
                            </tbody>


                        </table>
                    </div>
                </div>

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    //  var inputElm = document.querySelector('[name=value]'),
    //     tagify = new Tagify(inputElm);
    $(document).ready(function() {
        $('.value-select').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
    });

    $(document).ready(function() {
        $('#add_option').click(function() {
            // Clone the input wrapper
            var inputWrapper = $('.input-wrapper').first().clone();

            // Clear the values of the cloned inputs
            inputWrapper.find('select').val('');
            inputWrapper.find('select[name="value[]"]').html('');
            inputWrapper.find('input[name="value[]"]').val('');


            // Append the cloned input wrapper to the parent container
            $('.input-wrapper').last().after(inputWrapper);
        });
    });
</script>


@endsection
