<div class="row">

    <div class="col-lg-4 col-12">
        <div class="single-block give-review">
            <h4>4.5 (Overall)</h4>
            <ul>
                <li>
                    <span>5 stars - 38</span>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                </li>
                <li>
                    <span>4 stars - 10</span>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star"></i>
                </li>
                <li>
                    <span>3 stars - 3</span>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star"></i>
                    <i class="lni lni-star"></i>
                </li>
                <li>
                    <span>2 stars - 1</span>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star"></i>
                    <i class="lni lni-star"></i>
                    <i class="lni lni-star"></i>
                </li>
                <li>
                    <span>1 star - 0</span>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star"></i>
                    <i class="lni lni-star"></i>
                    <i class="lni lni-star"></i>
                    <i class="lni lni-star"></i>
                </li>
            </ul>

            {{-- @if (Auth::user()) --}}
            <!-- Button trigger modal -->
            <button type="button" @if (!Auth::user()) disabled @endif class="btn review-btn"
                data-bs-toggle="modal" data-bs-target="#AddReviewModal">
                Leave a Review
            </button>
            {{-- @endif --}}

        </div>
    </div>

    <div class="col-lg-8 col-12">



        <div class="single-block">
            <div class="reviews">
                <h4 class="title">Latest Reviews</h4>

                @foreach ($reviews as $review)
                    <!-- Start Single Review -->
                    <div class="single-review">
                        <img src="https://via.placeholder.com/150x150" alt="#">
                        <div class="review-info">
                            <div>
                                <div>
                                    <h4>{{ $review->user->first_name }} {{ $review->user->last_name }}
                                    </h4>
                                    <span>{{ $review->created_at ? $review->created_at->format('d M Y') : '' }}</span>
                                </div>
                                @if (Auth::user())
                                @if ($review->user_id == Auth::user()->id)
                                {{-- <div style="float: right">
                                    <a href="" class="">Edit</a>
                                </div> --}}
                                <a style="float: right" href="{{Route('reviews.edit',$review->id)}}" @if (!Auth::user()) disabled @endif
                                    class="btn review-btn" data-bs-toggle="modal" data-bs-target="#EditReviewModal">
                                    Edit Review
                                 </a>
                            @endif
                                    
                                @endif
                               

                            </div>

                            <ul class="stars">
                                <?php $rating = $review->rating;
                                for ($i=1; $i <= $rating ; $i++) { ?>
                                <li><i class="lni lni-star-filled"></i></li>
                                <?php
                                }
                                ?>
                            </ul>
                            <p>{{ $review->review }}</p>
                        </div>
                    </div>
                    <!-- End Single Review -->
                @endforeach

            </div>
        </div>





    </div>

</div>


