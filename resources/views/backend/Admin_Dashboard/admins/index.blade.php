@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('admins_trans.Admins') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('admins_trans.Admins') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('admins_trans.All_Admins') }}</a></li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('admins_trans.Id') }}</th>
                            <th>{{ trans('admins_trans.Admin_Name') }}</th>
                            <th>{{ trans('admins_trans.Email') }}</th>
                            <th>{{ trans('admins_trans.Super_Admin') }}</th>
                            <th>{{ trans('admins_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin) 
                            <tr>

                                <td>{{ $admin->id }}</td>

                                <td>
                                    {{ $admin->name }}
                                </td>
                                <td>
                                    {{ $admin->email }}
                                </td>
                                <td>
                                    @if ( $admin->super_admin == 1)
                                        <span class="text-success">  {{ trans('admins_trans.Yes') }}</span> 
                                    @else
                                         <span class="text-danger">  {{ trans('admins_trans.No') }} </span> 
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.admins.edit', $admin->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.admins.destroy', $admin->id) }}" method="post"
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
