@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('orders_trans.Create_Order') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('orders_trans.Create_Order') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('orders_trans.Create_Order') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('orders_trans.Orders') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{ Route('admin.orders.store') }}"
                    autocomplete="off">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('orders_trans.Name') }}" name="name" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('products_trans.User_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="user_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('products_trans.Choose') }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('products_trans.Store_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="store_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('products_trans.Choose') }}</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>



                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-backend.form.textarea 
                                label="{{ trans('orders_trans.Description') }}"
                                name="description"  />
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('orders_trans.Status') }}<span class="text-danger">*</span></label>
                                
                                {{-- <x-backend.form.radio name="status" :options="
                                ['active'=>'Active','inactive'=>'Inactive']" /> --}}
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active">
                                    <label class="form-check-label">
                                        {{ trans('orders_trans.Active') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="inactive"
                                        checked>
                                    <label class="form-check-label">
                                        {{ trans('orders_trans.Inactive') }}
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


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('orders_trans.Image') }}<span class="text-danger">*</span></label>
                                <div class="avatar-img">
                                    {{-- <label class="avatar-label circle" for="upload-photo" >+</label>
                                    <img class="avatar" src="{{URL::asset('assets/images/user.png')}}" alt=""> --}}
                                    <input onchange="preview()" type="file" name="image" accept="image/*"
                                        id="upload-photo" />
                                </div>
                                @error('image')
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






                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('orders_trans.Add') }}</button>


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