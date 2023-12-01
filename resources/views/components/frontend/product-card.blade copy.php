<!-- Start Single Product -->
<div class="single-product">
    <div class="product-image">
        <img src="{{ $product->image_url }}" height="200" width="200" alt="#">

        <div class="button">
            <a href="{{ Route('products.show_product', $product->slug) }}" class="btn">
                {{-- <i class="lni lni-cart"></i> --}}
                {{ trans('home_trans.Show') }}
            </a>
        </div>
    </div>
    <div class="product-info">

        {{-- <span class="category">{{ trans('home_trans.Category') }} :
            <a href="{{ Route('shop_grid.index', ['category_id' => $product->category->id]) }}">
                {{ $product->category->name }}
            </a>
        </span>

        <span class="category">{{ trans('home_trans.Vendor') }} :
            <a href="{{ url()->route('shop_grid.index', ['vendor_id' => $product->vendor->id]) }}">
                {{ $product->vendor->name }}
        </span> --}}

        <span class="category">{{ trans('home_trans.Category') }} :
            <a href="{{ route('shop_grid.index', ['categoryId' => $product->category->id]) }}">
                {{ $product->category->name }}
            </a>
        </span>

        <span class="category">{{ trans('home_trans.Store') }} :
            <a href="{{ route('shop_grid.indexStore', ['storeId' => $product->store->id]) }}">
                {{ $product->store->name }}
            </a>
        </span>

        {{-- <span class="category">{{ trans('home_trans.Store') }} :{{ $product->store->name }} </span> --}}

        <h4 class="title">
            <a href="{{ Route('products.show_product', $product->slug) }}">
                {{ $product->name }}
            </a>

        </h4>

        @php
            $product_reviews = App\Models\Review::where('product_id', $product->id)->get('rating');
            $total_reviews = count($product_reviews);
            $sum_ratings = 0;
            foreach ($product_reviews as $review) {
                $sum_ratings += $review->rating;
            }
            $average_rating = $total_reviews > 0 ? $sum_ratings / $total_reviews : 0;
        @endphp

        <ul class="review">
            <?php for ($i = 1; $i <= $average_rating; $i++): ?>
            <li><i class="lni lni-star-filled"></i></li>
            <?php endfor; ?>

            <?php for ($i = 1; $i <= 5 - $average_rating; $i++): ?>
            <li><i class="lni lni-star"></i></li>
            <?php endfor; ?>

            <li><span>{{ $average_rating }}.0 {{ trans('home_trans.Review(s)') }}</span></li>
        </ul>

        <div class="price">
            <span>{{ Currency::format($product->price) }}</span>
            @if ($product->compare_price)
                <span class="discount-price">{{ Currency::format($product->compare_price) }}</span>
            @endif
        </div>
    </div>
</div>
<!-- End Single Product -->