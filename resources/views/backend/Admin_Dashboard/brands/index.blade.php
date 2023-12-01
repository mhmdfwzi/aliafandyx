@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('brands_trans.Brands') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('brands_trans.Brands') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('brands_trans.All_Brands') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('brands_trans.Brands') }}</li>
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
                            <th></th>
                            <th>{{ trans('brands_trans.Id') }}</th>
                            <th>{{ trans('brands_trans.Brand_Name') }}</th>

                            <th>{{ trans('brands_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>
                                    <img src="{{ $brand->image_url }}" height="50" width="50" alt="">
                                </td>
                                
                                <td>{{ $brand->id }}</td>
                                
                                <td>                                   
                                        {{ $brand->name }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @can('update',$brand)
                                        <a href="{{ Route('admin.brands.edit', $brand->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan
                                    


                                    <form action="{{ Route('admin.brands.destroy', $brand->id) }}" method="post"
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
