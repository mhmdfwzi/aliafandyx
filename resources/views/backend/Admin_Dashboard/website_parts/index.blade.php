@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('websiteParts_trans.WebsiteParts') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('websiteParts_trans.WebsiteParts') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('websiteParts_trans.All_WebsiteParts') }}</a></li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('websiteParts_trans.Id') }}</th>
                            <th>{{ trans('websiteParts_trans.Key') }}</th>
                            <th>{{ trans('websiteParts_trans.Value') }}</th>
                            <th>{{ trans('websiteParts_trans.Image') }}</th>
                            <th>{{ trans('websiteParts_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($WebsiteParts as $part)
                            <tr>


                                <td>{{ $part->id }}</td>

                                <td>
                                    {{ $part->key }}
                                </td>

                                <td>
                                    @if ($part->value == '0')
                                        <span class="text-danger">{{ trans('websiteParts_trans.Hide') }}</span>
                                    @elseif($part->value == '1')
                                        <span class="text-success">{{ trans('websiteParts_trans.Show') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ $part->image_url }}" 
                                    @if($part->image) 
                                    height="100" width="200" 
                                    @else  
                                    height="50" width="50" 
                                    @endif 
                                    alt="">
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ Route('admin.websiteParts.edit', $part->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>




                                    <form action="{{ Route('admin.websiteParts.destroy', $part->id) }}"
                                        method="post" style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection
