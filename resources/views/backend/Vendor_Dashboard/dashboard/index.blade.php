@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('dashboard_trans.Dashboard') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('dashboard_trans.Dashboard') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">

            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->

<div class="row">
    <div class="col-md-12 mt-30 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="row">

                     {{-- Orders --}}
                     <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-success">
                                            <i class="fa-solid fa-cart-shopping highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">عدد  الطلبات</p>
                                        <h4>{{$orders_count}}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a
                                        href="{{Route('vendor.orders.index')}}" ><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                   
                    {{-- Products --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-warning">
                                            <i class="fa-brands fa-product-hunt highlight-icon"></i>                                        </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">عدد المنتجات</p>
                                        <h4>{{\App\Models\Product::count()}}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a
                                        href="{{Route('vendor.products.index')}}"  ><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fa-solid fa-pen"></i> <a
                                        href="{{Route('vendor.products.create')}}"  > <span class="text-danger"> تسجيل منتج جديد</span></a>
                                </p>
                            </div>
                        </div>
                    </div>

                   


                      {{-- Products Attributes --}}
      


                      {{-- Products Attribute Values --}}
                      <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-danger">
                                            <i class="fa-brands fa-product-hunt highlight-icon"></i>                                        </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">عدد خواص المنتجات</p>
                                        <h4>{{$attribute_values_count}}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a
                                        href=""  ><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                   
            
                </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
