@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('delivery_trans.Deliverys') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('delivery_trans.Deliverys') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('delivery_trans.All_Deliverys') }}</a></li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('delivery_trans.Id') }}</th>
                            <th>{{ trans('delivery_trans.Delivery_Name') }}</th>
                            <th>{{ trans('delivery_trans.Email') }}</th>
                            <th>{{ trans('delivery_trans.Phone_Number') }}</th>ظ
                            <th>{{ trans('delivery_trans.Category_Name') }}</th>
                            <th>{{ trans('delivery_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>

                                <td>{{ $delivery->id }}</td>

                                <td>
                                    {{ $delivery->name }}
                                </td>
                                <td>
                                    {{ $delivery->email }}
                                </td>
                                <td>
                                    {{ $delivery->phone_number }}
                                </td>
                                <td>
                                    {{ $delivery->category->name }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.deliveries.edit', $delivery->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.deliveries.destroy', $delivery->id) }}" method="post"
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
