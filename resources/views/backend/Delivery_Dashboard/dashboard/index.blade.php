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

                  
            
                </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
