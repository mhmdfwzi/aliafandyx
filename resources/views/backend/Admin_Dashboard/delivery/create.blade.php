@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('delivery_trans.Create_Delivery') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('delivery_trans.Create_Delivery') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('delivery_trans.Create_Delivery') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('delivery_trans.Deliverys') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{ Route('admin.deliveries.store') }}"
                    autocomplete="off">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('delivery_trans.Delivery_Name') }}" name="name"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('delivery_trans.Email') }}" name="email"
                                    type="email" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('delivery_trans.Password') }}" name="password"
                                    type="password" class="form-control" />
                            </div>
                        </div>

                    </div>
 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('delivery_trans.Phone_Number') }}" name="phone_number"
                                    type="phone" class="form-control" />
                            </div>
                        </div>
 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('delivery_trans.Category_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="category_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('delivery_trans.Choose') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>





                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('delivery_trans.Add') }}</button>


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
