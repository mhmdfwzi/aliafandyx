@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('coupons_trans.Coupons') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('coupons_trans.Coupons') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('coupons_trans.All_Coupons') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('coupons_trans.Coupons') }}</li>
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
                            <th>{{ trans('coupons_trans.Id') }}</th>
                            <th>{{ trans('coupons_trans.Coupon_Name') }}</th>
                            <th>{{ trans('coupons_trans.Code') }}</th>
                            <th>{{ trans('coupons_trans.Usage_Count') }}</th>
                            <th>{{ trans('coupons_trans.Expiration_Date') }}</th>
                            <th>{{ trans('coupons_trans.Store_Name') }}</th>
                            <th>{{ trans('coupons_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>

                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->name  }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->usage_count }}</td>
                                <td>{{ $coupon->expiration_date }}</td>
                                <td>{{ $coupon->store->name }}</td>
                                
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ Route('admin.coupons.edit', $coupon->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ Route('admin.coupons.destroy', $coupon->id) }}" method="post"
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
