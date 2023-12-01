@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('profile_trans.Edit_Profile') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('profile_trans.Edit_Profile') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('profile_trans.Edit_Profile') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('profile_trans.Profile') }}</li>
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


                <form method="post" enctype="multipart/form-data"
                    action="{{ Route('admin.profile.update', [$user->id]) }}" autocomplete="off">

                    @csrf
                    @method('patch')


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('profile_trans.First_Name') }}" name="first_name"
                                    :value="$user->profile->first_name" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('profile_trans.Last_Name') }}" name="last_name"
                                    :value="$user->profile->last_name" class="form-control" />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender"> {{ trans('profile_trans.user_Gender') }} <span
                                        class="text-danger">*</span></label>

                              <x-backend.form.select name="gender" class="custom-select mr-sm-2" :options="['male'=>'Male','female'=>'Female']"
                                    :selected="$user->profile->gender" />

                                {{-- <select class="custom-select mr-sm-2" name="gender"
                                    @if ($user->gender == old('gender', $user->gender)) selected @endif>
                                    <option selected disabled>{{ trans('profile_trans.Choose') }}</option>

                                    <option value="male" @if (old('gender', $user->gender) == 'male') selected @endif>
                                        {{ trans('profile_trans.Male') }}
                                    </option>

                                    <option value="female" @if (old('gender', $user->gender) == 'female') selected @endif>
                                        {{ trans('profile_trans.Female') }}
                                    </option>
                                </select> --}}
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <input  class="form-control" name="birthday" value="{{old('birthday',$user->profile->birthday)}}" id="datepicker-action" data-date-format="yyyy-mm-dd" >

                                {{-- <x-backend.form.input label="{{ trans('profile_trans.Birthday') }}" name="birthday"
                                    :value="$user->profile->birthday" class="form-control" /> --}}
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('profile_trans.Street_Address') }}"
                                    name="street_address" :value="$user->profile->street_address" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('profile_trans.City') }}" name="city"
                                    :value="$user->profile->city" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('profile_trans.Postal_Code') }}"
                                    name="postal_code" :value="$user->profile->postal_code" class="form-control" />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.select name="country" class="custom-select mr-sm-2" :options="$countries"
                                    :selected="$user->profile->country" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.select name="locale" class="custom-select mr-sm-2" :options="$locales"
                                    :selected="$user->profile->locale" />
                            </div>
                        </div>
                    </div>









                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('profile_trans.Edit') }}</button>


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
</script>
@endsection
