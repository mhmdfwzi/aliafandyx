@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('roles_trans.Edit_Role') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('roles_trans.Edit_Role') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('roles_trans.Edit_Role') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('roles_trans.Roles') }}</li>
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


                <form method="post" enctype="multipart/form-data"
                    action="{{ Route('admin.roles.update',$role->id) }}" autocomplete="off">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('roles_trans.Role_Name') }}" name="name"
                                    :value="$role->name" class="form-control" />

                            </div>
                        </div>
                    </div>

                    <fieldset>
                        <legend>{{ trans('roles_trans.Abilities') }}</legend>

                        @foreach (app('abilities') as $ability_code => $ability_name)
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    {{$ability_name}}
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" name="abilities[{{$ability_code}}]" value="allow" 
                                    @checked($role_abilities[$ability_code] == "allow") >
                                    Allow
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" name="abilities[{{$ability_code}}]" value="deny"
                                    @checked($role_abilities[$ability_code] == "deny")>
                                    Deny
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" name="abilities[{{$ability_code}}]" value="inherit"
                                    @checked($role_abilities[$ability_code] == "inherit")>
                                    Inherit
                                </div>
                            </div>
                        @endforeach
                    </fieldset>


                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('roles_trans.Edit') }}</button>


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
