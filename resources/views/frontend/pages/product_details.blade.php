<x-front-layout title="{{ $product->name }}">

    <x-slot name="breadcrumbs">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ $product->name }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href=""><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="">Shop</a></li>
                            <li>{{ $product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
 
    <x-frontend.alert type="error" />

    <x-frontend.alert type="success" />

    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">

            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset($product->image_url_pd) }}" id="current" alt="#">
                                </div>
                                 
                                <div class="images">
                                    
                                    @if (isset($product_pics[0]) )
                                    <img src="{{ asset($product->image_url_pd) }}" class="img" alt="#">
                                    @foreach ($product_pics as $product_pic)  
                                    <img src="{{ asset('storage/'.$product_pic->image) }}" class="img" alt="#">
                                    @endforeach
                                    @endif
                                     
                                </div>
                                 
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title text-center">{{ $product->name }}</h2>
							
                            <p class="category" style="color:#000">
                                <i class="lni lni-tag"></i> 
								
            <a href="{{ route('shop_grid.index', ['categoryId' => $product->category->id]) }}">
                {{ $product->category->name }}
            </a>
       
			 <a href="{{ route('shop_grid.indexStore', ['storeId' => $product->store->id]) }}">
                {{ $product->store->name }}
            </a>
									
								 
                                {{-- <a href="javascript:void(0)">Action cameras</a> --}}
                            </p>
							<p>
							{{ $product->short_description }}
							</p>
                            <h3 class="price">سعر المنتج  {{ Currency::format($product->price) }}
                                @if ($product->compare_price)
                                    <span class="text-danger">{{ Currency::format($product->compare_price) }}</span>
                                @endif
                            </h3>
                            <p class="info-text"></p>

                            <form action="{{ Route('cart.store') }}" method="post">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                

                                 
                                <div class="bottom-content" >
                                    <div class="row align-items-end">



                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="form-group quantity">
                                                @if (isset($product_sizes[0]) )
                                                <select class="form-control" required name='size'> 
                                                    <option value="">اختار المقاس</option> 
                                                @foreach ($product_sizes as $product_size)  
                                                    <option value='{{$product_size->attribute_value->value}}'>
                                                        {{$product_size->attribute_value->value}}</option>
                
                
                                                @endforeach
                                                </select>
                                                 
                                                @endif

                                                @if (isset($shose_sizes[0]) )
                                                <select class="form-control" required name='size'> 
                                                    <option value="">اختار المقاس</option> 
                                                @foreach ($shose_sizes as $shose_size)  
                                                    <option value='{{$shose_size->attribute_value->value}}'>
                                                        {{$shose_size->attribute_value->value}}</option>
                
                
                                                @endforeach
                                                </select>
                                                 
                                                @endif

                                                @if (isset($product_kamons[0]) )
                                                <select class="form-control" required name='size'>                                                     
                                                @foreach ($product_kamons as $product_kamon)  
                                                    <option value='{{$product_kamon->attribute_value->value}}'>
                                                        {{$product_kamon->attribute_value->value}}</option>
                
                
                                                @endforeach
                                                </select>
                                                 
                                                @endif


                                            </div>
                                        </div>
 
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="form-group quantity">
                                                @if (isset($product_colors[0]) )
                                                <select class="form-control" required name='color'>
                                                    <option value="">اختار اللون</option> 
                                                @foreach ($product_colors as $product_color)  
                                                    <option value='{{$product_color->attribute_value->value}}'>
                                                        {{$product_color->attribute_value->value}}</option>
                
                
                                                @endforeach
                                                </select>
                                                 
                                                @endif


                                            </div>
                                        </div>

                                     <div class="col-lg-6 col-md-6 col-6">
                                            <div class="form-group quantity">
										 
												
												@if($product->measure ==0.10)
                                                <input type="hidden" name="quantity" value="1">
                                                <select class="form-control" name="measure" >
												 
													
													@for ($j = $product->measure*200; $j <= 500; $j+=$j)
										            
															  
												   <option value ="{{$j}}" >   {{$j}}    جرام 
												بسعر	{{ $product->price*$j/100}} جنيه 
													</option>   
												    
												    
													@endfor					  
 
                                                </select>
                                                @elseif($product->measure ==0.250)
                                                <input type="hidden" name="quantity" value="1">
                                                <select class="form-control" name="measure" >
												 
													
													@for ($j = $product->measure; $j <= 4; $j+=  $product->measure)
										            @if ($j<1)
															  
												   <option value ="{{$j}}" >   {{$j*1000}}    جرام 
												بسعر	{{ $product->price*$j}} 
													</option>   
												    
												    @else
													<option value ="{{$j}}" >  {{$j}} كيلو  
													
													بسعر	{{ $product->price*$j}} 
													</option>
													
													@endif
													@endfor					  

                                                </select>
                                                @else
                                                <input type="hidden" name="measure" value="1">
                                                <select class="form-control" name="quantity" >
 												 <option value ="1" >1</option>   
												 <option value ="2" >2</option>   
												 <option value ="3" >3</option>   
												 <option value ="4" >4</option>   
												 <option value ="5" >5</option>   
												 <option value ="6" >6</option>   
												 </select>
												@endif
                                            </div>
                                        </div>

                            

                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="button cart-button">
                                            <button class="btn" type="submit" style="width: 100%;">ضيف للسله</button>
                                        </div>
                                    </div>

 
                                </div>
                                </div>
                                

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>وصف المنتج</h4>
                                
                                 {!! $product->description !!} 
                                 
                            
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-body">
                                


                            </div>
                        </div>
                    </div>
                </div>


                <x-frontend.reviews :reviews="$reviews" />

            </div>
            
        
        </div>
    </section>
    <section>
        <div class="brands">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                        <h2 class="title">Popular Brands</h2>
                    </div>
                </div>
                <div class="brands-logo-wrapper">
                    <div class="brands-logo-carousel d-flex align-items-center justify-content-between">

                        @foreach ($products as $product)
                        <a href="{{ Route('products.show_product', $product->slug) }}">
                        <div class="brand-logo" style="direction: rtl">
                            <img src="{{$product->image_url}}" alt="{{$product->name}}">
							</br>
                            {{$product->name}}
                            {{ Currency::format($product->price) }}
                        </div>                            
                    </a>
                        @endforeach
 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Item Details -->

    <!-- Add Review Modal -->



   



    <div class="modal fade review-modal" id="AddReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{ Route('reviews.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
       
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="review-rating">Rating</label>
                                    <select class="form-control" name="rating" id="review-rating">
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review-message">Review</label>
                            <textarea class="form-control" name="review" id="review-message" rows="8" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-footer button">
                        <button type="submit" class="btn">Submit Reviewwww</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End Add Review Modal -->


    <!-- Edit Review Modal -->
    <div class="modal fade add-review-modal" id="EditReviewModal" tabindex="-1"
        aria-labelledby="AddReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddReviewModalLabel">Leave a Reviewwww</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="" method="post">
                    @csrf
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="review-rating">Rating</label>
                                    <select class="form-control" name="rating" id="review-rating">
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review-message">Review</label>
                            <textarea class="form-control" name="review" id="review-message" rows="8" required>
                                {{-- {{$review->rating}} --}}
                            </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-footer button">
                        <button type="submit" class="btn">Submit Revieww</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End Edit Review Modal -->


    @push('scripts')
    <script type="text/javascript">
    

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: true,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
        <script type="text/javascript">
            const current = document.getElementById("current");
            const opacity = 0.6;
            const imgs = document.querySelectorAll(".img");
            imgs.forEach(img => {
                img.addEventListener("click", (e) => {
                    //reset opacity
                    imgs.forEach(img => {
                        img.style.opacity = 1;
                    });
                    current.src = e.target.src;
                    //adding class 
                    //current.classList.add("fade-in");
                    //opacity
                    e.target.style.opacity = opacity;
                });
            });
        </script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
         
 
    @endpush


    
</x-front-layout>
