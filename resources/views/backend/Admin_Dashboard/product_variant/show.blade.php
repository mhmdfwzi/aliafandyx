@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('product_variant_trans.Show_Product_Variant') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('product_variant_trans.Show_Product_Variant') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('product_variant_trans.All_Product_Variants') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('product_variant_trans.Show_Product_Variant') }}</li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('product_variant_trans.Id') }}</th>
                            <th>{{ trans('product_variant_trans.Product_Name') }}</th>
                            <th>{{ trans('product_variant_trans.Quantity') }}</th>
                            <th>{{ trans('product_variant_trans.Price') }}</th>
                            <th>{{ trans('product_variant_trans.Compare_Price') }}</th>
                            <th>{{ trans('product_variant_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_variants as $product_variant)
                            <tr>
                                
                                <td>{{ $product_variant->id }}</td>
                                <td>{{ $product_variant->product->name }}</td>
                               
                                <td>{{ $product_variant->quantity }}</td>
                                <td>{{ $product_variant->price}}</td>
                                <td>{{ $product_variant->compare_price }}</td>

                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.product_variants.edit', $product_variant->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.product_variants.destroy', $product_variant->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                    {{-- <a href="" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> 
                                    
                                </a>     --}}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection
