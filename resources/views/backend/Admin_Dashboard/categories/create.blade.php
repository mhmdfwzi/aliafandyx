@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('categories_trans.Create_Category') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('categories_trans.Create_Category') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('categories_trans.Create_Category') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('categories_trans.Categories') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{ Route('admin.categories.store') }}"
                    autocomplete="off">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('categories_trans.Name') }}" name="name"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>



                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('categories_trans.Category_Parent') }} <span
                                        class="text-danger">*</span></label>
                                <select name="parent_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('categories_trans.No_Parent') }}</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-backend.form.textarea label="{{ trans('categories_trans.Description') }}"
                                    name="description" />
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>{{ trans('categories_trans.Status') }}<span
                                                class="text-danger">*</span></label>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                value="active">
                                            <label class="form-check-label">
                                                {{ trans('categories_trans.Active') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                value="inactive" checked>
                                            <label class="form-check-label">
                                                {{ trans('categories_trans.Inactive') }}
                                            </label>
                                        </div>
                                    </div>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>{{ trans('categories_trans.Featured') }}
                                            <span class="text-danger">*</span> : </label>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="featured"
                                                value="1">
                                            <label class="form-check-label">
                                                {{ trans('categories_trans.Featured') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="featured"
                                                value="0" checked>
                                            <label class="form-check-label">
                                                {{ trans('categories_trans.Not_Featured') }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                @error('featured')
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
                                <label> {{ trans('categories_trans.Image') }}<span class="text-danger">*</span></label>
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
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('categories_trans.Add') }}</button>


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
