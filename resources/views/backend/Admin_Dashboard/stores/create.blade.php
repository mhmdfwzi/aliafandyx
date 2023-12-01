@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('stores_trans.Create_Store') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('stores_trans.Create_Store') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('stores_trans.Create_Store') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('stores_trans.Stores') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">


                <form method="post" enctype="multipart/form-data" action="{{ Route('admin.stores.store') }}"
                    autocomplete="off">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('stores_trans.Name') }}<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select  name="categories_id[]" class="custom-select mr-sm-2" multiple required>
                                    <option value="">اختر تصنيفات</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="governorate" id="" class="custom-select mr-sm-2" required>

                                    <option disabled selected> اختار المحافظة </option>
                                    @foreach ($destinations as $destination)
                                        @if ($destination->rank == '1')
                                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('governorate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="city" id="" class="custom-select mr-sm-2" required>
                                    <option disabled selected> اختار المدينة </option>
                                
                                </select>
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="neighborhood" id="" class="custom-select mr-sm-2" required>
                                    <option disabled selected> اختار المنطقة </option>
                                
                                </select>
                                @error('neighborhood')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('Street_Address') }}<span class="text-danger">*</span></label>
                                <input type="text" name="street_address" class="form-control">
                                @error('street_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('Phone_Number') }}<span class="text-danger">*</span></label>
                                <input type="tel" name="phone_number" class="form-control">
                                @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('percent') }}<span class="text-danger">*</span></label>
                                <input type="text" name="percent" class="form-control" value="{{ old('percent') }}" required>
                                @error('percent')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

 


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('Description') }}<span
                                        class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="5">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('stores_trans.Status') }}<span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active">
                                    <label class="form-check-label">
                                        {{ trans('stores_trans.Active') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="inactive"
                                        checked>
                                    <label class="form-check-label">
                                        {{ trans('stores_trans.Inactive') }}
                                    </label>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>


                    {{-- logo_image --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('stores_trans.Logo_Image') }}<span
                                        class="text-danger">*</span></label>
                                <div class="avatar-img">

                                    <input onchange="preview()" type="file" name="logo_image" accept="image/*"
                                        id="upload-photo" />
                                </div>
                                @error('logo_image')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-lg text-center p-3">
                                <img src="{{ asset('backend/assets/images/profile-avatar.jpg') }}" height="200"
                                    width="200" class="img-fluid" id="frame" />
                            </div>
                        </div>
                    </div>



                    {{-- cover_image --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('stores_trans.Cover_Image') }}<span
                                        class="text-danger">*</span></label>
                                <div class="avatar-img">

                                    <input onchange="previewes()" type="file" name="cover_image" accept="image/*"
                                        id="upload-photo" />
                                </div>
                                @error('logo_image')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-lg text-center p-3">
                                <img src="{{ asset('backend/assets/images/profile-avatar.jpg') }}" height="200"
                                    width="200" class="img-fluid" id="frame_1" />
                            </div>
                        </div>
                    </div>






                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('stores_trans.Add') }}</button>


                </form>




            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    function previewes() {
        frame_1.src = URL.createObjectURL(event.target.files[0]);
    }

    $(document).ready(function() {
        // When the "governorate" dropdown value changes
        $('select[name="governorate"]').on('change', function() {
            var governorateId = $(this).val(); // Get the selected governorate ID

            console.log(governorateId);

            // Make an AJAX request to fetch cities based on the selected governorate
            $.ajax({
                url: '/admin/get-cities',
                method: 'GET',
                data: {
                    governorate_id: governorateId
                },
                success: function(response) {
                    // Clear the current city options
                    $('select[name="city"]').empty();
                    $('select[name="city"]').append(
                        '<option disabled selected>أختار  المدينة</option>');

                    $.each(response.cities, function(key, city) {
                        $('select[name="city"]').append('<option value="' + city
                            .id + '">' + city.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // When the "city" dropdown value changes
        $('select[name="city"]').on('change', function() {
            var cityId = $(this).val(); // Get the selected city ID

            console.log(cityId);

            // Make an AJAX request to fetch neighborhoods based on the selected governorate
            $.ajax({
                url: '/admin/get-neighborhoods',
                method: 'GET',
                data: {
                    city_id: cityId
                },
                success: function(response) {
                    // Clear the current neighborhood options
                    $('select[name="neighborhood"]').empty();
                    $('select[name="neighborhood"]').append(
                        '<option disabled selected>أختار  المنطقة</option>');

                    $.each(response.neighborhoods, function(key, neighborhood) {
                        $('select[name="neighborhood"]').append('<option value="' +
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
@endsection
