@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('orders_trans.Orders') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('orders_trans.Orders') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('orders_trans.All_Orders') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('orders_trans.Orders') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<x-backend.alert type="info" />

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

       

                <table id="table_id" class="display">
                    <thead>
                        <tr> 
                            <th>{{ trans('orders_trans.Id') }}</th>
                            <th>{{ trans('orders_trans.User_Name') }}</th>  
                            <th>{{ trans('orders_trans.Products') }}</th> 
                            <th>{{ trans('orders_trans.Status') }}</th>
                            <th>{{ trans('orders_trans.Order_Number') }}</th>
                            <th>{{ trans('orders_trans.Total') }}</th>                            
                            <th>{{ trans('orders_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedOrders = $orders->groupBy('cart_id');
                        @endphp

                        @foreach ($groupedOrders as $cartId => $ordersGroup)
						
						<table border='1' style="width:100%">
	<tr><td style="width:30%">رقم الطلب</td><td>{{ $ordersGroup[0]->id }}</td></tr>
	<tr><td>حالة الطلب</td><td>
		
		@if ($ordersGroup[0]->status == 'pending')
                                        <span class="badge badge-rounded badge-success p-2 mb-2">
                                            {{ trans('orders_trans.Pending') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'processing')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Processing') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'delivering')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Delivering') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'completed')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Completed') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'cancelled')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Cancelled') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'refunded')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Refunded') }}
                                        </span>
                                    @endif
		</td></tr>
							
<tr><td>العميل</td><td>
	{{ $ordersGroup[0]->user->first_name }} {{ $ordersGroup[0]->user->last_name }}
	
	</td></tr>
							
	 @foreach ($ordersGroup[0]->products as $product)					
<tr><td colspan ="2">  
                                   
										<table border='1' style="width:100%">
											<tr><td style="width:30%">المنتج</td><td>{{ $product->order_item->product_name }} </td>
												<td rowspan="4" align='center'> <img src="{{$product->image_url}}" height="50" width="50" alt=""></td> </tr>
											<tr><td>الكمية</td><td> 
												  {{ $product->order_item->measure }} 
												</td></tr>
											<tr><td>الخصائص</td><td>
												@if(isset($product->order_item->color))
												اللون : {{ $product->order_item->color}}/
												@endif
											 
												@if(isset($product->order_item->size))
												القياس : {{ $product->order_item->size}}
												@endif
											 
												 

												</td></tr>
											<tr><td>السعر</td><td>
												{{Currency::format( $product->order_item->price-
												($product->order_item->price*$ordersGroup[0]->store->percent/100))}}
												<br>
												@php
                                        $totalPrice = 0;
                                    @endphp

                                    @foreach ($ordersGroup[0]->products as $product)
                                        @php
                                            $totalPrice += $product->price;
                                        @endphp
                                    @endforeach

                                    {{ Currency::format( $product->order_item->price) }}</td></tr>
	</table>
                                        
                                    @endforeach							
							
</td></tr>
							
							
							
							
							
							
							
				</table>
						
						
						
						
                            <tr>
                                <!-- Cart ID with rowspan -->
                                

                                <!-- First order's details -->
                                <td>{{ $ordersGroup[0]->id }}</td>
                                <td>{{ $ordersGroup[0]->user->first_name }}</td>
                                 <td>
                                    @foreach ($ordersGroup[0]->products as $product)
                                        {{ $product->order_item->product_name }} {
                                        {{ $product->order_item->quantity }} / {{ $product->order_item->price }} }
                                    @endforeach
                                </td>
 
                                <td>
                                    
                                </td>
                                <td></td>


                                <td>
                                    @php
                                        $totalPrice = 0;
                                    @endphp

                                    @foreach ($ordersGroup[0]->products as $product)
                                        @php
                                            $totalPrice += $product->price;
                                        @endphp
                                    @endforeach

                                    {{ Currency::format($totalPrice) }}
                                </td>



                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.orders.edit', $ordersGroup[0]->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ Route('admin.orders.destroy', $ordersGroup[0]->id) }}"
                                        method="post" style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @foreach ($ordersGroup->skip(1) as $additionalOrder)
                                <tr>
                                    <!-- Only display order details (except cart ID) for additional rows -->
                                    <td>{{ $additionalOrder->id }}</td>
                                    <td>{{ $additionalOrder->user->first_name }}</td>  
                                    <td>
                                        @foreach ($additionalOrder->products as $product)
                                            {{ $product->order_item->product_name }} {
                                            {{ $product->order_item->quantity }} / {{ $product->order_item->price }} }
                                        @endforeach
                                    </td>
 
                                    <td>
                                        @if ($additionalOrder->status == 'pending')
                                            <span class="badge badge-rounded badge-success p-2 mb-2">
                                                {{ trans('orders_trans.Pending') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'processing')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Processing') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'delivering')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Delivering') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'completed')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Completed') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'cancelled')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Cancelled') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'refunded')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Refunded') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $additionalOrder->number }}</td>
                                    <td>
                                        @php
                                            $totalPrice = 0;
                                        @endphp

                                        @foreach ($additionalOrder->products as $product)
                                            @php
                                                $totalPrice += $product->price;
                                            @endphp
                                        @endforeach

                                        {{ Currency::format($totalPrice) }}
                                    </td>

                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ Route('admin.orders.edit', $additionalOrder->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ Route('admin.orders.destroy', $additionalOrder->id) }}"
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

        $('#assign_delivery').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var orderId = button.data(
                'order-id'); // Extract the order ID from the button data attribute
            $('#order_id').val(orderId); // Set the value of the hidden input field with the order ID
        });
    });
</script>
@endsection