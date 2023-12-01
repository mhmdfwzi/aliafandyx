@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('Add_Destination') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('destinations_trans.Add_Destination') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('destinations_trans.All_Destinations') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('destinations_trans.Destinations') }}</li>
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

                <x-backend.alert type="info" />
                {{-- <a href="{{ Route('admin.destinations.index') }}"
                    class="btn btn-sm btn-outline-primary">destinations</a> --}}
                <!-- row -->
                <form action="{{ Route('admin.destinations.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('destinations_trans.Place_Name') }}" name="name" class="form-control"
                                    required="required" value='' />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ trans('destinations_trans.Place_Type') }}</label>

                                <select name="rank" id="" class="custom-select mr-sm-2" required>
                                    <option value="0">{{ trans('destinations_trans.Country') }}</option>
                                    <option value="1">{{ trans('destinations_trans.Governate') }}</option>
                                    <option value="2">{{ trans('destinations_trans.City') }}</option>
                                    <option value="3">{{ trans('destinations_trans.Neighborhood') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('destinations_trans.Parent') }}<span class="text-danger">*</span></label>
                                <select name="parent_id" id="" class="custom-select mr-sm-2">
                                    <option disabled>أختار من القائمة </option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="سعر الشحن" name="price" class="form-control"
                                    type="number" />
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-success btn-md nextBtn btn-lg ">Add to destinations</button>


                </form>
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
