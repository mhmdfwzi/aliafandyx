<div class="row">
    <div class="col-lg-3 col-12">
        <!-- Start Product Sidebar -->
        <div class="product-sidebar">
            <!-- Start Single Widget -->
            <div class="single-widget search">
                <h3>Search Product</h3>
                <form action="#">
                    <input type="text" placeholder="Search Here...">
                    <button type="submit"><i class="lni lni-search-alt"></i></button>
                </form>
            </div>
            <!-- End Single Widget -->


           

            {{-- Categories Filter --}}
            <div class="single-widget">
                <h3>All Categories</h3>
               
                <ul class="list">
                    @foreach ($categories as $category)
                        <li>
                            <a href="" 
                            {{-- wire:model="selectedCategory"  --}}
                             wire:click="$emit('product')"
                            {{-- wire:click.prevent="changeCategory('{{$category->id}}')" --}}
                            >{{ $category->name }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- End Categories Filter --}}


            <!-- Brand Filter -->
            <div class="single-widget condition">
                <h3>Filter by Brand</h3>
                @foreach ($brands as $brand)
                    {{-- <div class="form-check"> --}}
                    {{-- <input type="checkbox" value="{{ $brand->id }}" wire:model="brandInputs[]"> --}}
                    <input type="checkbox" id="brand_{{ $brand }}" value="{{ $brand->id }}"
                       wire:model="selectedBrands">
                    <label class="form-check-label" for="flexCheckDefault11">
                        {{ $brand->name }}
                    </label>
                    
                    Brand: {{ var_export($brandInputs) }}
                    {{-- </div> --}}
                @endforeach
            </div>
            <!-- End Brand Filter -->

            <!-- Start Single Widget -->
            <div class="single-widget range">
                <h3>Price Range</h3>
                <input type="range" class="form-range" name="range" step="1" min="100" max="10000"
                    value="10" onchange="rangePrimary.value=value">
                <div class="range-inner">
                    <label>$</label>
                    <input type="text" id="rangePrimary" placeholder="100" />
                </div>
            </div>
            <!-- End Single Widget -->
            <!-- Start Single Widget -->
            <div class="single-widget condition">
                <h3>Filter by Price</h3>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                    <label class="form-check-label" for="flexCheckDefault1">
                        $50 - $100L (208)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                    <label class="form-check-label" for="flexCheckDefault2">
                        $100L - $500 (311)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                    <label class="form-check-label" for="flexCheckDefault3">
                        $500 - $1,000 (485)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                    <label class="form-check-label" for="flexCheckDefault4">
                        $1,000 - $5,000 (213)
                    </label>
                </div>
            </div>
            <!-- End Single Widget -->

        </div>
        <!-- End Product Sidebar -->
    </div>
    <div class="col-lg-9 col-12">
        <div class="product-grids-head">
            <div class="product-grid-topbar">
                <div class="row align-items-center">

                    <div class="col-lg-7 col-md-8 col-12">
                        <div class="product-sorting dropdown">
                            <label for="sorting">Sort by:</label>
                            <select class="form-control" name="sort" id="sort">
                                <option >Select Order</option>
                                <option>Low Price</option>
                                <option >High Price</option>
                                <option >A - Z Order</option>
                            </select>
                            <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                        </div>



                    </div>

                    {{-- <div class="col-lg-5 col-md-4 col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-grid" type="button" role="tab"
                                    aria-controls="nav-grid" aria-selected="true"><i
                                        class="lni lni-grid-alt"></i></button>
                                <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-list" type="button" role="tab"
                                    aria-controls="nav-list" aria-selected="false"><i
                                        class="lni lni-list"></i></button>
                            </div>
                        </nav>
                    </div> --}}
                </div>
            </div>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                    <div class="row">

                      {{-- <livewire:product-layout  /> --}}

                      @forelse ($products as $product)
                      <div class="col-lg-4 col-md-6 col-12">

                          <!-- Start Single Product -->
                          <div class="single-product">
                              <div class="product-image">
                                  <img src="{{ $product->image_url }}" alt="#">
                                  @if ($product->sale_percent)
                                      <span class="sale-tag">- {{ $product->sale_percent }} %</span>
                                  @endif
                                  <div class="button">
                                      <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                          Add to Cart</a>
                                  </div>
                              </div>
                              <div class="product-info">
                                  <span class="category">{{ $product->category->name }}</span>
                                  <h4 class="title">
                                      <a href="product-grids.html">{{ $product->name }}</a>
                                  </h4>
                                  <ul class="review">
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star"></i></li>
                                      <li><span>4.0 Review(s)</span></li>
                                  </ul>
                                  <div class="price">
                                      <span>{{ Currency::format($product->price) }}</span>
                                      @if ($product->compare_price)
                                          <span
                                              class="discount-price">{{ Currency::format($product->compare_price) }}</span>
                                      @endif
                                  </div>
                              </div>
                          </div>
                          <!-- End Single Product -->
                      </div>

                  @empty

                      <div class="row">
                          <div class="col-md-12">
                              <div>
                                  There is no products
                              </div>
                          </div>
                      </div>
                  @endforelse


                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- Pagination -->
                            <div class="pagination center">
                                <ul class="pagination-list">
                                    {{ $products->links() }}
                                </ul>
                            </div>

                            <!--/ End Pagination -->
                        </div>
                    </div>
                </div>

                {{-- <div class="tab-pane fade" id="nav-list" role="tabpanel"
                    aria-labelledby="nav-list-tab">
                    <div class="row">
            
                        @foreach ($products as $prouct)
                            <div class="col-lg-12 col-md-12 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="product-image">
                                                <img src="https://via.placeholder.com/335x335"
                                                    alt="#">
                                                <div class="button">
                                                    <a href="product-details.html" class="btn"><i
                                                            class="lni lni-cart"></i> Add to
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div class="product-info">
                                                <span class="category">Watches</span>
                                                <h4 class="title">
                                                    <a href="product-grids.html">{{ $product->name }}</a>
                                                </h4>
                                                <ul class="review">
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star"></i></li>
                                                    <li><span>4.0 Review(s)</span></li>
                                                </ul>
                                                <div class="price">
                                                    <span>$199.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        @endforeach
            
            
            
                    </div>
            
                    <div class="row">
                        <div class="col-12">
                            <!-- Pagination -->
                            <div class="pagination center">
                                <ul class="pagination-list">
                                    {{ $products->links() }}
                                </ul>
                            </div>
            
                            <!--/ End Pagination -->
                        </div>
                    </div>
                </div> --}}
            </div>




        </div>
    </div>
</div>
