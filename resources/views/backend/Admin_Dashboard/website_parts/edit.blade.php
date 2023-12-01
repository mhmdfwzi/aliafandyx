@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('websiteParts_trans.Edit_WebsitePart') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('websiteParts_trans.Edit_WebsitePart') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('websiteParts_trans.Edit_WebsitePart') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('websiteParts_trans.WebsiteParts') }}</li>
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
                    action="{{ Route('admin.websiteParts.update', [$websitePart->id]) }}" autocomplete="off">

                    @csrf
                    @method('PUT')

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('websiteParts_trans.WebsitePart_Name') }}"
                                    name="key" value="{{ $websitePart->key }}" class="form-control" />
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('websiteParts_trans.Value') }}<span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="value" value="1"
                                        @checked($websitePart->value == '1')>
                                    <label class="form-check-label">
                                        {{ trans('websiteParts_trans.Show') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="value" value="0"
                                        @checked($websitePart->value == '0')>
                                    <label class="form-check-label">
                                        {{ trans('websiteParts_trans.Hide') }}
                                    </label>
                                </div>
                                @error('value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{ trans('brands_trans.Image') }}<span class="text-danger">*</span></label>
                                <div class="avatar-img">
                                
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
                                <img src="{{ $websitePart->image_url }}" height="200" width="200" class="img-fluid"
                                    id="frame" />
                            </div>
                        </div>
                    </div>


                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('websiteParts_trans.Edit') }}</button>


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
