@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('vendors_trans.Vendors') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('vendors_trans.Vendors') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('vendors_trans.All_Vendors') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('vendors_trans.Vendors') }}</li>
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
                            <th>{{ trans('vendors_trans.Id') }}</th>
                            <th>{{ trans('vendors_trans.Vendor_Name') }}</th>
                            <th>{{ trans('vendors_trans.Email') }}</th>
                            <th>{{ trans('vendors_trans.Store_Name') }}</th>
                            <th>{{ trans('vendors_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor)
                            <tr>

                                <td>{{ $vendor->id }}</td>

                                <td>
                                    {{ $vendor->name }}
                                </td>
                                <td>
                                    {{ $vendor->email }}
                                </td>
                                <td>
                                    {{ $vendor->store->name }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.vendors.edit', $vendor->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.vendors.destroy', $vendor->id) }}" method="post"
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
