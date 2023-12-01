@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('orders_trans.Edit_Order') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('orders_trans.Edit_Order') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('orders_trans.Edit_Order') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('orders_trans.Orders') }}</li>
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
                    action="{{ Route('admin.orders.update', $order->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('orders_trans.Order_Number') }}"
                                    value="{{ $order->number }}" name="number" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('orders_trans.User_Name') }} <span class="text-danger">*</span></label>
                                <select name="user_id" id="" class="custom-select mr-sm-2">
                                    {{-- @foreach ($users as $user) --}}
                                    <option value="{{ $order->user_id }}">
                                        {{ $order->user->first_name }}</option>
                                    {{-- @endforeach --}}
                                </select>
                                @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('orders_trans.Store_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="store_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('orders_trans.Choose') }}</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}" @selected($order->store_id == $store->id)>
                                            {{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>





                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('orders_trans.Status') }}<span class="text-danger">*</span></label>

                                {{-- <x-backend.form.radio name="status" :options="
                                ['active'=>'Active','inactive'=>'Inactive']" /> --}}


                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="pending"
                                        @checked($order->status == 'pending')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Pending') }}" />

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="processing"
                                        @checked($order->status == 'processing')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Processing') }}" />

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="delivering"
                                        @checked($order->status == 'delivering')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Delivering') }}" />
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="completed"
                                        @checked($order->status == 'completed')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Completed') }}" />
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="cancelled"
                                        @checked($order->status == 'cancelled')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Cancelled') }}" />
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="refunded"
                                        @checked($order->status == 'refunded')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Refunded') }}" />
                                </div>

                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('orders_trans.Payment_Status') }}<span
                                        class="text-danger">*</span></label>



                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_status" value="pending"
                                        @checked($order->payment_status == 'pending')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Pending') }}" />

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_status"
                                        value="paid" @checked($order->payment_status == 'paid')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Paid') }}" />

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_status"
                                        value="failed" @checked($order->payment_status == 'failed')>
                                    <x-backend.form.label class="form-check-label"
                                        label="{{ trans('orders_trans.Failed') }}" />
                                </div>

                                @error('payment_status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('orders_trans.Payment_Method') }}"
                                    value="{{ $order->payment_method }}" name="payment_method"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('orders_trans.Coupon') }}" name="coupon_id"
                                    value="{{ $order->coupon ? $order->coupon->id : '' }}" class="form-control"  />
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('orders_trans.Shipping') }}"
                                    value="{{ $order->shipping }}" name="shipping" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('orders_trans.Tax') }}"
                                    value="{{ $order->tax }}" name="tax" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('orders_trans.Total') }}"
                                    value="{{ $order->total }}" name="total" class="form-control" />
                            </div>
                        </div>
                    </div>






                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('orders_trans.Edit') }}</button>


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