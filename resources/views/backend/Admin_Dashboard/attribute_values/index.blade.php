@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('attribute_values_trans.Attribute_Values') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('attribute_values_trans.Attribute_Values') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('attribute_values_trans.All_Attribute_Values') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('attribute_values_trans.Attribute_Values') }}</li>
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
                            <th>{{ trans('attribute_values_trans.Id') }}</th>
                            <th>{{ trans('attribute_values_trans.Attribute_Value_Name') }}</th>
                            <th>{{ trans('attribute_values_trans.Value') }}</th>
                            <th>{{ trans('attribute_values_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attribute_values as $attribute_value)
                            <tr>

                                <td>{{ $attribute_value->id }}</td>
                                <td>
                                    {{ $attribute_value->name }}
                                </td>
                                <td>
                                    {{ $attribute_value->value }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ Route('admin.attribute_values.edit', $attribute_value->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ Route('admin.attribute_values.destroy', $attribute_value->id) }}"
                                        method="post" style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
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
