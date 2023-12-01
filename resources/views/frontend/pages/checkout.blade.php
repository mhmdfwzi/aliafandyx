<x-front-layout>



    <x-slot name="breadcrumbs">

 
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Cart</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i>
                                    {{ trans('checkout_trans.Home') }}</a></li>
                            <li><a href=""> {{ trans('checkout_trans.Shop') }}</a></li>
                            <li> {{ trans('checkout_trans.Cart') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>


    <x-frontend.alert type="error" />

    <x-frontend.alert type="success" />


    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <form action="{{ Route('checkout.store') }}" method="post">
                        
                        @csrf
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#billingAddress"
                                        aria-expanded="true" aria-controls="billingAddress">
                                        {{ trans('checkout_trans.Your_Personal_Details') }} </h6>


                                    <section class="checkout-steps-form-content collapse show" id="billingAddress"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">

                                            <div class="col-md-12"   >
                                                <div class="single-form form-default">
                                                    {{-- <label>User Name</label> --}}
                                                    <div class="row"> 
                                                            <x-frontend.form.input name="address[billing][first_name]"
                                                            placeholder="الاسم الاول  "
                                                                value="{{ Auth::check() ? Auth::user()->first_name : old('address.billing.first_name') }}" />
                                                         
                                                         
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-md-12"   >
                                                <div class="single-form form-default">
                                                    {{-- <label>User Name</label> --}}
                                                    <div class="row">
                                                      
                                                            <x-frontend.form.input name="address[billing][last_name]"
                                                            placeholder="الاسم الثانى  "
                                                                value="{{ Auth::check() ? Auth::user()->last_name : old('address.billing.last_name') }}" />
                                                         
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-md-12"   >
                                                <div class="single-form form-default">
                                                    {{-- <label>User Name</label> --}}
                                                    <div class="row"> 
                                                            <x-frontend.form.input name="address[billing][phone_number]"
                                                        placeholder="رقم التليفون"
                                                            value="{{ Auth::check() ? Auth::user()->phone_number : old('address.billing.phone_number') }}" />
                                                   
                                                         
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-md-12"   >
                                                <div class="single-form form-default">
                                                    {{-- <label>User Name</label> --}}
                                                    <div class="row"> 
                                                        <select name="address[billing][governorate_id]"  
                                                        class="custom-select mr-sm-2 form-control" >
                                                           <option disabled selected>
                                                               {{ trans('auth_trans.Choose_Governorate') }}
                                                           </option>
                                                           @foreach ($destinations as $destination)
                                                               @if ($destination->rank == '1')
                                                                   <option value="{{ $destination->id }}"
                                                                       @if (Auth::check()) {{ Auth::user()->governorate->id == $destination->id ? 'selected' : '' }}
                                                                       @else
                                                                           {{ old('address.billing.governorate_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                       {{ $destination->name }}
                                                                   </option>
                                                               @endif
                                                           @endforeach
                                                       </select>
                                                         
                                                    </div>
                                                </div>
                                            </div> 

  
                                            <div class="col-md-12"   >
                                                <div class="single-form form-default">
                                                    {{-- <label>User Name</label> --}}
                                                    <div class="row"> 
                                                        <select name="address[billing][city_id]" id=""
                                                        class="custom-select mr-sm-2 form-control" >
                                                           <option disabled selected>
                                                               {{ trans('auth_trans.Choose_City') }}
                                                           </option>
                                                           @foreach ($destinations as $destination)
                                                               @if ($destination->rank == '2')
                                                                   <option value="{{ $destination->id }}"
                                                                       @if (Auth::check()) {{ Auth::user()->city->id == $destination->id ? 'selected' : '' }}
                                                                       @else
                                                                           {{ old('address.billing.city_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                       {{ $destination->name }}
                                                                   </option>
                                                               @endif
                                                           @endforeach
                                                       </select>
                                                     </div>
                                                </div>
                                            </div> 

                                            <div class="col-md-12"   >
                                                <div class="single-form form-default">
                                                    {{-- <label>User Name</label> --}}
                                                    <div class="row"> 
                                                        <select name="address[billing][neighborhood_id]" id=""
                                                        class="custom-select mr-sm-2 form-control" >
                                                            <option disabled selected>
                                                                {{ trans('auth_trans.Choose_Neighborhood') }}
                                                            </option>
                                                            @foreach ($destinations as $destination)
                                                                @if ($destination->rank == '3')
                                                                    <option value="{{ $destination->id }}"
                                                                        @if (Auth::check()) {{ Auth::user()->neighborhood->id == $destination->id ? 'selected' : '' }}
                                                                        @else
                                                                            {{ old('address.billing.neighborhood_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                        {{ $destination->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 

 

                                            <div class="col-md-12"   >
                                                <div class="single-form form-default">
                                                    {{-- <label>User Name</label> --}}
                                                    <div class="row"> 
                                                        <x-frontend.form.input name="address[billing][street_address]"
                                                        value="{{ Auth::check() ? Auth::user()->street_address : old('address.billing.street_address') }}" />
                                                     
                                                    </div>
                                                </div>
                                            </div> 

                                      
  


                                        </div>
                                    </section>

                                </li>
                              
                                {{-- <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefive" aria-expanded="false"
                                        aria-controls="collapsefive">Payment Info</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapsefive"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="checkout-payment-form">
                                                    <div class="single-form form-default">
                                                        <label>Cardholder Name</label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="Cardholder Name">
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>Card Number</label>
                                                        <div class="form-input form">
                                                            <input id="credit-input" type="text"
                                                                placeholder="0000 0000 0000 0000">
                                                            <img src="assets/images/payment/card.png" alt="card">
                                                        </div>
                                                    </div>
                                                    <div class="payment-card-info">
                                                        <div class="single-form form-default mm-yy">
                                                            <label>Expiration</label>
                                                            <div class="expiration d-flex">
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="MM">
                                                                </div>
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="YYYY">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default">
                                                            <label>CVC/CVV <span><i
                                                                        class="mdi mdi-alert-circle"></i></span></label>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="***">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default button">
                                                        <button type="submit" class="btn">pay now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li> --}}

                                <div class="single-form form-default button">
                                    <button type="submit"
                                        class="btn">انهاء الطلب</button>
                                </div>
                            </ul>
                        </div>

                    </form>


                </div>





                <div class="col-lg-4">
                    <div class="checkout-sidebar">

                        



                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">بيانات  المدفوعات</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">اجمالى سعر المنتجات:</p>
                                    <p class="price">{{ Currency::format($cart->total()) }}</p>
                                </div>

                                @php
                                $user = Auth::user();
                                $neighborhood_shipping = $user->neighborhood->price;
                                $shipping_fees = 0;
                                $storeIds = [];

                                foreach ($cart->get() as $cart_item) {
                                    $store_id = $cart_item->product->store_id;

                                    if (!in_array($store_id, $storeIds)) {
                                        // If the store ID is not in the array, it's a unique store
                                        $storeIds[] = $store_id;
                                    }
                                }
                                // Now, $shipping_fees contains the total shipping fees based on the unique stores in the cart.

                                $numberOfUniqueStores = count($storeIds);
                                 if($numberOfUniqueStores===1){
                        $shipping_fees = $neighborhood_shipping;
                    }else{
                        $shipping_fees = (($numberOfUniqueStores-1)*5)+$neighborhood_shipping;
                    }

                            @endphp

                                <div class="total-price shipping">
                                    <p class="value">الشحن :</p>
                                    <p class="price"> {{ Currency::format($shipping_fees) }}</p>
                                </div>
                                <div class="total-price discount">
                                    <p class="value">كوبون الخصم:</p>
                                    <p class="price">
                                        <?php
                                        // get coupon stored in session , if it exist
                                        $coupon = Session::get('coupon');
                                        if ($coupon) {
                                            echo $coupon->discount_amount;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">المبلغ المطلوب:</p>
                                    <p class="price">{{ Currency::format($shipping_fees + $cart->total()) }}</p>
                                </div>
                            </div>
                            {{-- <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div> --}}
                        </div>


                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->


    @push('scripts')
        <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>


        <script>
            $(document).ready(function() {
                // Get the checkbox and form fields
                var checkbox = $('#checkbox-3');
                var billingFields = $('section#billingAddress input');
                var shippingFields = $('section#shippingAddress input');

                // Add event listener to the checkbox
                checkbox.on('change', function() {
                    console.log(shippingFields);
                    // Check if the checkbox is checked
                    if (checkbox.prop('checked')) {
                        // Copy values from billing fields to shipping fields
                        billingFields.each(function(index) {
                            shippingFields.eq(index).val($(this).val());
                        });
                    }
                });
            });
        </script>
    @endpush

</x-front-layout>