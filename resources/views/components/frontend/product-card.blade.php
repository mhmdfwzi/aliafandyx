<!-- Start Single Product -->
<div class="single-product">
			@if ($product->sale_percent)
       <span class="sale-tag">- {{ $product->sale_percent }} %</span>
          @endif  
    <div class="product-image">
                                                    
                                                       
        <a href="{{ Route('products.show_product', $product->slug) }}">
			<img src="{{ $product->image_url }}"  alt="#">
</a>
 
    </div>



    <div class="product-info">
		        <h4 class="title">
            <a href="{{ Route('products.show_product', $product->slug) }}">{{ $product->name }} </a>
 </h4>
        <span class="category">     
            <a href="{{ route('shop_grid.index', ['categoryId' => $product->category->id]) }}">
            {{ $product->category->name }}
        </a> من : 
    
         <a href="{{ route('shop_grid.indexStore', ['storeId' => $product->store->id]) }}">
            {{ $product->store->name }}
        </a></span>
         


      

        @php
            $product_reviews = App\Models\Review::where('product_id', $product->id)->get('rating');
            $total_reviews = count($product_reviews);
            $sum_ratings = 0;            
            foreach ($product_reviews as $review) {
                $sum_ratings += $review->rating;
            }
            $average_rating = $total_reviews > 0 ? $sum_ratings / $total_reviews : 0;
        @endphp
 

        <div class="price">
            <span>{{ Currency::format($product->price) }}</span>
            @if ($product->compare_price>$product->price)
                <span class="discount-price">{{ Currency::format($product->compare_price) }}</span>
 
            @endif
        </div>
    </div>
</div>
<!-- End Single Product -->
