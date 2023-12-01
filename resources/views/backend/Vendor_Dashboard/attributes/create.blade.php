@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('attributes_trans.Create_Attribute') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('attributes_trans.Create_Attribute') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('attributes_trans.Create_Attribute') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('attributes_trans.Attributes') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{ Route('vendor.attributes.store') }}"
                    autocomplete="off">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('attributes_trans.Attribute_Name') }}" name="name"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>


                    {{-- <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('attributes_trans.Has_Color') }}<span class="text-danger">*</span></label>
                        
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="has_color" value="1">
                                    <label class="form-check-label">
                                        {{ trans('attributes_trans.Color') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="has_color" value="0"
                                        checked>
                                    <label class="form-check-label">
                                        {{ trans('attributes_trans.Not_Color') }}
                                    </label>
                                </div>
                                
                                @error('has_color')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                   
                    </div> --}}


                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('attributes_trans.Add') }}</button>


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
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
