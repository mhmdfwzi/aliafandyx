@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('attributes_trans.Attributes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('attributes_trans.Attributes') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('attributes_trans.Trash_Attributes') }}</a></li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('attributes_trans.Id') }}</th>
                            <th>{{ trans('attributes_trans.Name') }}</th>
                            <th>{{ trans('attributes_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributes as $Attribute)
                            <tr>
                                

                                <td>{{ $Attribute->id }}</td>
                                <td>{{ $Attribute->name }}</td>
                                

                                <td>
                                    <form action="{{Route('backend.attributes.restore',$attribute->id)}}" method="post" style="display:inline">
                                        @csrf
                                        @method('put')
                                        
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-edit"></i>
                                            إعادة
                                        </button>   
                                    </form>
                                   
                                    <form action="{{Route('backend.attributes.forceDelete',$attribute->id)}}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        
                                        <button type="submit" class="btn btn-danger btn-sm" >
                                            <i class="fa fa-trash"></i> 
                                            حذف نهائى
                                        </button>   
                                    </form>
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
