<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{ $items->count() }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ $items->count() }} منتج</span>
            <a href="{{ Route('cart.index') }}">شوف السله</a>
        </div>
        <ul class="shopping-list">
            @foreach ($items as $item)
                <li>
                    <a href="javascript:void(0)" class="remove remove-item" data-id="{{ $item->id }}"
                        title="Remove this item"><i class="lni lni-close"></i></a>
                    <div class="cart-img-head">
                        <a class="cart-img" href="{{ Route('products.show_product', $item->product->slug) }}"><img
                                src="{{ $item->product->image_url }}" alt="#"></a>
                    </div>

                    <div class="content">
                        <h4><a href="{{ Route('products.show_product', $item->product->slug) }}">
                                {{ $item->product->name }}</a></h4> 
                            @php
                            if($item->product->measure==.10)
                            {
                              $price=  $item->quantity * $item->product->price* $item->measure/100;  
                            }else 
                            {
                                $price=  $item->quantity * $item->product->price* $item->measure;  
                            }
                        @endphp

                            <span class="amount">{{ Currency::format(round($price, 2)) }}</span>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="bottom">
            <div class="total">
                <span>اجمالى المبلغ الطلوب</span>
                <span class="total-amount">{{ Currency::format($total) }}</span>
            </div>
            <div class="button">
                <a href="{{ Route('checkout.create') }}" class="btn animate">اتمام الطلب</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
