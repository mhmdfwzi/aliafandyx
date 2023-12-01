<section class="h-100 h-custom" style="background-color: #eee; overflow-y: auto; height:1300px ">
          <div class="container py-5 h-100">

          {{-- <div class="row d-flex justify-content-start  h-100" style="width: 1500px"> --}}

          @foreach ($orders as $order)
                    <div class="col-lg-10 col-xl-10">
                    <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                              <div class="card-body p-5">

                              <p class="lead fw-bold mb-5" style="color: #f37a27;">Order No. {{ $order->number }}</p>

                              <div class="row">
                              <div class="col mb-3">
                                        <p class="small text-muted mb-1">Date</p>
                                        <p>{{ $order->created_at->diffForHumans() }}</p>
                              </div>
                              <div class="col mb-3">
                                        <p class="small text-muted mb-1">Order No.</p>
                                        <p>{{ $order->number }}</p>
                              </div>
                              </div>

                              <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                              @foreach ($order->products as $product)
                                        <div class="row">
                                        <div class="col-md-8 col-lg-9">
                                                  <p>{{ $product->name }}</p>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                                  <p>{{ Currency::format($product->price) }}</p>
                                        </div>
                                        </div>
                              @endforeach

                              <div> -------------------------------------------- </div>
                              <div class="row">
                                        <div class="col-md-8 col-lg-9">
                                        <p class="mb-0">Shipping</p>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                        <p class="mb-0">00.00</p>
                                        </div>
                              </div>
                              </div>

                              <div class="row my-4">
                              <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                                        <p class="lead fw-bold mb-0" style="color: #f37a27;">
                                        {{ Currency::format($order->total) }}</p>
                              </div>
                              </div>

                              <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tracking Order</p>

                              <div class="row">
                              <div class="col-lg-12">

                                        <div class="horizontal-timeline">

                                        <ul class="list-inline items d-flex justify-content-between">

                                                  <li class="list-inline-item items-list">
                                                  <p class="py-1 px-2 rounded text-white" 
                                                  @if ($order->status == "pending")
                                                            style="background-color: grey;"
                                                  @else
                                                            style="background-color: #f37a27;"
                                                  @endif >
                                                  Pending
                                                  </p>
                                                  </li>

                                                  <li class="list-inline-item items-list">
                                                  <p class="py-1 px-2 rounded text-white" 
                                                  @if ($order->status == "processing")
                                                            style="background-color: grey;"
                                                  @else
                                                            style="background-color: #f37a27;"
                                                  @endif >
                                                  Processing
                                                  </p>
                                                  </li>

                                                  <li class="list-inline-item items-list">
                                                  <p class="py-1 px-2 rounded text-white" 
                                                  @if ($order->status == "delivering")
                                                            style="background-color: grey;"
                                                  @else
                                                            style="background-color: #f37a27;"
                                                  @endif>
                                                  Delivering
                                                  </p>
                                                  </li>

                                                  <li class="list-inline-item items-list">
                                                  <p class="py-1 px-2 rounded text-white" 
                                                  @if ($order->status == "completed")
                                                            style="background-color: grey;"
                                                  @else
                                                            style="background-color: #f37a27;"
                                                  @endif >
                                                  Completed
                                                  </p>
                                                  </li>

                                                  <li class="list-inline-item items-list">
                                                  <p class="py-1 px-2 rounded text-white" 
                                                  @if ($order->status == "cancelled")
                                                            style="background-color: grey;"
                                                  @else
                                                            style="background-color: #f37a27;"
                                                  @endif >
                                                  Cancelled
                                                  </p>
                                                  </li>

                                                  <li class="list-inline-item items-list">
                                                  <p class="py-1 px-2 rounded text-white" 
                                                  @if ($order->status == "refunded")
                                                            style="background-color: grey;"
                                                  @else
                                                            style="background-color: #f37a27;"
                                                  @endif >
                                                  Refunded
                                                  </p>
                                                  </li>

                                                  {{-- <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                                                                      <p style="margin-right: -8px;">Delivered</p>
                                                                      </li>
                                                                      </ul> --}}

                                        </div>

                              </div>
                              </div>

                              <p class="mt-4 pt-2 mb-0">Want any help? <a href="#!" style="color: #f37a27;">Please
                                        contact
                                        us</a></p>

                              </div>
                    </div>
                    </div>
          @endforeach

          {{-- </div> --}}

          </div>
</section>
