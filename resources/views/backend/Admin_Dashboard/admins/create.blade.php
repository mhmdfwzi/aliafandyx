@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('admins_trans.Add_Admin') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('admins_trans.Add_Admin') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('admins_trans.Add_Admin') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('admins_trans.Admins') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{ Route('admin.admins.store') }}"
                    autocomplete="off">

                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('admins_trans.Admin_Name') }}" name="name"
                                    class="form-control" />

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('admins_trans.User_Name') }}" name="user_name"
                                    class="form-control" />

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('admins_trans.Email') }}" name="email"
                                    class="form-control" type="email" />

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('admins_trans.Password') }}" name="password"
                                    class="form-control" type="password" />

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('admins_trans.Phone') }}" name="phone_number"
                                    class="form-control" type="number" />

                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('admins_trans.Super_Admin') }} <span
                                        class="text-danger">*</span></label>

                                <x-backend.form.select name="super_admin" class="custom-select mr-sm-2" selected=""
                                    :options="[false => 'Not Super Admin', true => 'Super Admin']" />

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('admins_trans.Status') }} <span class="text-danger">*</span></label>

                                <x-backend.form.select name="status" class="custom-select mr-sm-2" selected=""
                                    :options="['active' => 'Active', 'inactive' => 'In Active']" />

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label> {{ trans('admins_trans.Roles') }} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                @foreach ($roles as $role)
                                    <label class="form-check-label" for="flexCheckChecked">
                                        {{ $role->name }}
                                    </label>
                                    <input type="checkbox" name="roles[]" id="" value="{{ $role->id }}">
                                @endforeach


                            </div>
                        </div>
                    </div>













                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('admins_trans.Add') }}</button>


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
