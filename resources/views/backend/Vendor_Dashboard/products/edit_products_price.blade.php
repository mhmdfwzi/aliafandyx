@extends('backend.layouts.master')

@section('title')
    {{ trans('products_trans.Edit_Prices') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('products_trans.Edit_Prices') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('products_trans.Edit_Prices') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('products_trans.Products') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{ Route('vendor.products.update_products_price') }}" method="post"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 child-repeater-table">
                                <table class="table table-bordered table-responsive" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('products_trans.Name') }}</th>
                                            <th>{{ trans('products_trans.Price') }}</th>
                                            <th>{{ trans('products_trans.Name') }}</th>
                                            <th>{{ trans('products_trans.Price') }}</th>
                                            <th>{{ trans('products_trans.Name') }}</th>
                                            <th>{{ trans('products_trans.Price') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @php
                                            $productsChunks = $products->chunk(3); // Split the products into chunks of 3
                                        @endphp

                                        @foreach ($productsChunks as $chunk)
                                            <tr>
                                                @foreach ($chunk as $product)
                                                    <input class="form-control" name="product_id[]" hidden
                                                        value="{{ $product->id }}" type="text">
                                                    <td>
                                                        <input type="text" name="name[]" disabled
                                                            value="{{ old('name', $product->name) }}" class="form-control"
                                                            placeholder="{{ trans('products_trans.Name') }}">
                                                        @error('name')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="price[]"
                                                            value="{{ old('price', $product->price) }}"
                                                            class="form-control"
                                                            placeholder="{{ trans('products_trans.Price') }}">
                                                        @error('price')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                        @enderror
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ trans('products_trans.Edit') }}</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/jquery-ui/jquery-ui.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var datatable = $('#table_id').DataTable({
                stateSave: true,
                "pageLength": 3
            })
        });
    </script>
@endsection