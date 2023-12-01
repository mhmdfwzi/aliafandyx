@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('product_variant_trans.Create_Product_Variant') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('product_variant_trans.Create_Product_Variant') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('product_variant_trans.Create_Product_Variant') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('product_variant_trans.Product_Variants') }}</li>
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



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> {{ trans('product_variant_trans.Attribute_Name') }} <span
                                    class="text-danger">*</span></label>
                            <select name="attribute_id" id="" class="custom-select mr-sm-2">
                                <option value="">{{ trans('product_variant_trans.Choose') }}</option>
                                @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}" @selected($product_variant->attribute_id == $attribute->id)>
                                        {{ $attribute->name }}</option>
                                @endforeach
                            </select>
                            @error('attribute_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> {{ trans('product_variant_trans.Attribute_Value_Name') }} <span
                                    class="text-danger">*</span></label>

                            <select name="attribute_value_id"  class="custom-select mr-sm-2">
                                <option value="">{{ trans('product_variant_trans.Choose') }}</option>
                                @foreach ($attribute_values as $attribute_value)
                                    <option value="{{ $attribute_value->id }}" @selected($product_variant->attribute_value_id == $attribute_value->id)>
                                        {{ $attribute_value->name }}</option>
                                @endforeach
                            </select>
                            @error('attribute_value_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>



                <br>

                <form method="post" enctype="multipart/form-data" action="{{ Route('admin.product_variants.update',$product_variant->id) }}"
                    id="product_variant_form" autocomplete="off">

                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product</label>
                                <input type="text" class="form-control" disabled value="{{ $product->name }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('product_variant_trans.SKU') }}" name="sku"
                                    value="{{ $product_variant->sku }}" class="form-control" />

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('product_variant_trans.Quantity') }}"
                                    value="{{ $product_variant->quantity }}" name="quantity" class="form-control" />
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('product_variant_trans.Price') }}" name="price"
                                value="{{ $product_variant->price }}"  class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('product_variant_trans.Compare_Price') }}"
                                value="{{ $product_variant->compare_price }}"   name="compare_price" class="form-control" />
                            </div>
                        </div>
                    </div>

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
                                  <img src="{{ $product_variant->image_url }}" height="200" width="200"
                                      class="img-fluid" id="frame" />
                              </div>
                          </div>
                    </div>


                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('product_variant_trans.Edit') }}</button>


                </form>




            </div>
        </div>
    </div>
</div>



@endsection
@section('js')
<script>
    // function to preview image
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    // product_variant_form element
    const product_variant_form = document.getElementById('product_variant_form');

    // removes product_variant_form element from DOM
//     product_variant_form.style.display = 'none';

    $(document).ready(function() {

        $('#product-variants-table').DataTable();

        // change attribute_value based on attribute
        $('select[name="attribute_id"]').on('change', function() {
            var attribute_id = $(this).val();
            if (attribute_id) {
                $.ajax({
                    url: "{{ URL::to('admin/get_attribute_value') }}/" + attribute_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="attribute_value_id"]').empty();
                        $('select[name="attribute_value_id"]').append(
                            '<option selected disabled >{{ trans('product_variant_trans.Choose') }}...</option>'
                        );
                        $.each(data, function(key, value) {
                            $('select[name="attribute_value_id"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });


        // add product variant form based on attribute_value
        $('select[name="attribute_value_id"]').on('change', function() {

            var attribute_value_id = $(this).val();
            var attribute_id = $('select[name="attribute_id"]').val();

            if (attribute_value_id) {
                $.ajax({
                    success: function(response) {
                        var $form = $(
                            '#product_variant_form'
                        ); // Convert the HTML code into a jQuery object

                        // Create and append the two input elements to the form
                        var input1 = '<input type="hidden" name="attribute_id" value="' +
                            attribute_id + '">';
                        var input2 =
                            ' <input type="hidden" name="attribute_value_id" value="' +
                            attribute_value_id + '">';
                        $form.append(input1);
                        $form.append(input2);
                        // show / appear product variant form
                        product_variant_form.style.display = 'block';

                    },
                    error: function() {
                        console.log('AJAX request failed');
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });


        // when submit product_variant_form 
//         $('#product_variant_form').on('submit', function(event) {
//             event.preventDefault(); // Prevent the default form submission

//             var form = $(this);
//             var formData = new FormData(form[0]); // Create FormData object to send form data
//             $.ajax({
//                 url: form.attr('action'), // Get the form action URL
//                 type: form.attr('method'), // Get the form method type (POST)
//                 data: formData,
//                 contentType: false,
//                 processData: false,
//                 success: function(response) {
//                     console.log(response);
//                     var newRow = '<tr style="text-align:center">' +
//                         '<td>' + response.id + '</td>' +
//                         '<td><img src="' + response.image_url +
//                         '" height="50" width="50" alt=""></td>' +
//                         '<td>' + response.product_name + '</td>' +
//                         '<td>' + response.attribute_name + '</td>' +
//                         '<td>' + response.attribute_value_name + '</td>' +
//                         '<td>' + response.quantity + '</td>' +
//                         '<td>' + response.price + '</td>' +
//                         '<td>' + response.compare_price + '</td>' +
//                         '<td>' +
//                         '<a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>' +
//                         '<a href="' + response.edit_url +
//                         '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>' +
//                         '<form action="' + response.delete_url +
//                         '" method="post" style="display:inline">' +
//                         '@csrf' +
//                         '@method('delete')' +
//                         '<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' +
//                         '</form>' +
//                         '</td>' +
//                         '</tr>';
//                     // Assuming the response is the HTML code for a new table row
//                     // You can modify this based on your actual response format
//                     $('#product-variants-table').append(
//                         newRow); // Append the new row to the table body
//                     form[0].reset(); // Reset the form inputs
//                     $('#frame').attr('src',
//                         "{{ asset('backend/assets/images/profile-avatar.jpg') }}");

//                 },
//                 error: function(xhr, status, error) {
//                     var errors = xhr.responseJSON.errors;

//                     // Clear previous error messages
//                     $('.alert.alert-danger').remove();
//                     // Display error messages
//                     $.each(errors, function(field, messages) {
//                         var fieldError = '<div class="alert alert-danger">' +
//                             messages[0] + '</div>';
//                         $('[name="' + field + '"]').after(fieldError);
//                     });
//                 }
//             });
//         });

    });
</script>
@endsection
