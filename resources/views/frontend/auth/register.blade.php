<x-front-layout>

@php
    $destinations = App\Models\Destination::all();
@endphp
    <x-slot name="breadcrumbs">


        
    </x-slot>

    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>سجل حساب جديد</h3>
                            <p>سجل فى ثوانى بسيطة  مرة واحدة بس  </p>
                        </div>


                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                        <form method="POST" action="{{ route('register') }}" style="direction: rtl">
                            @csrf

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group"> 
                                    <input class="form-control" type="text" name="first_name" id="reg-fn"
                                       placeholder=" الاسم الاول مثال :على    " required>
                                    @error('first_name')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
 
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group"> 
                                    <input class="form-control" type="text" name="last_name" id="reg-fn"  
                                    placeholder="الاسم الثانى مثال :افندى " required>
                                </div>
                                @error('last_name')
                                    <div class="alert alert-danger">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

      
                    

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group"> 
                                    <input class="form-control" type="text" required  name="phone_number" 
                                    style="direction: ltr; text-align:right"
                                    placeholder="رقم التليفون متصل بالواتس اب لاستلام كود التفعيل" >
                                    @error('phone_number')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group"> 
                                    <input class="form-control" type="password" name="password" id="reg-pass"
                                    placeholder="كلمة المرور" required>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
 

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="governorate_id" id="" class="form-control" required>
        
                                            <option disabled selected  value="" > اختار المحافظة </option>
                                            @foreach ($destinations as $destination)
                                                @if ($destination->rank == '1')
                                                    <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('governorate_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="city_id" id="" class="form-control" required>
                                            <option disabled selected  value=""> اختار المدينة </option>
                                        
                                        </select>
                                        @error('city_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="neighborhood_id" id="" class="form-control" required>
                                            <option disabled selected   > اختار المنطقة </option>
                                        
                                        </select>
                                        @error('neighborhood_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            
                            </div>



{{--
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">Postal code</label>
                                    <input class="form-control" type="text" name="postal_code">
                                    @error('postal_code')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                </div>
                            </div>

--}}
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">وصف مكان الوصول</label>
                                    <input class="form-control" required type="text" name="street_address">
                                    @error('street_address')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>



                            <div class="button">
                                <button class="btn" type="submit">تسجيل</button>
                            </div>

                            <p class="outer-link">لو عندك حساب ؟ <a href="{{ Route('login') }}">تسجيل دخول</a>

                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->

    @push('scripts')
        <script>
            
            $(document).ready(function() {
                // When the "governorate" dropdown value changes
                $('select[name="governorate_id"]').on('change', function() {
                    var governorateId = $(this).val(); // Get the selected governorate ID

                    console.log(governorateId);

                    // Make an AJAX request to fetch cities based on the selected governorate
                    $.ajax({
                        url: '/user/get-cities',
                        method: 'GET',
                        data: {
                            governorate_id: governorateId
                        },
                        success: function(response) {
                            // Clear the current city options
                            $('select[name="city_id"]').empty();
                            $('select[name="city_id"]').append(
                                '<option disabled selected  >أختار من القائمة</option>');

                            $.each(response.cities, function(key, city) {
                                $('select[name="city_id"]').append('<option value="' + city
                                    .id + '">' + city.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });

                // When the "city" dropdown value changes
                $('select[name="city_id"]').on('change', function() {
                    var cityId = $(this).val(); // Get the selected city ID

                    console.log(cityId);

                    // Make an AJAX request to fetch neighborhoods based on the selected governorate
                    $.ajax({
                        url: '/user/get-neighborhoods',
                        method: 'GET',
                        data: {
                            city_id: cityId
                        },
                        success: function(response) {
                            // Clear the current neighborhood options
                            $('select[name="neighborhood_id"]').empty();
                            $('select[name="neighborhood_id"]').append(
                                '<option disabled selected   >أختار من القائمة</option>');

                            $.each(response.neighborhoods, function(key, neighborhood) {
                                $('select[name="neighborhood_id"]').append('<option value="' +
                                    neighborhood.id + '">' + neighborhood.name +
                                    '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>
    @endpush

</x-front-layout>
