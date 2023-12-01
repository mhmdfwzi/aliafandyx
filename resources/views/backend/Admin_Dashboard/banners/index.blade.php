@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('banners_trans.Banners') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('banners_trans.Banners') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('banners_trans.All_Banners') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('banners_trans.Banners') }}</li>
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

                <table id="custom_table" class="display">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('banners_trans.Id') }}</th>
                            <th>{{ trans('banners_trans.Banner_Name') }}</th>
                            <th>{{ trans('banners_trans.Banner_Type') }}</th>
                            <th>{{ trans('banners_trans.Status') }}</th>
                            <th>{{ trans('banners_trans.Title') }}</th>
                            <th>{{ trans('banners_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td>
                                    <img src="{{ $banner->image_url }}" height="50" width="50" alt="">
                                </td>

                                <td>{{ $banner->id }}</td>

                                <td>
                                    {{ $banner->banner_name }}
                                </td>
                                <td>
                                    @if ($banner->banner_type == 'main_banner')
                                        <span class="text-info"> {{ trans('banners_trans.Main_Banner') }}</span>
                                    @elseif ($banner->banner_type == 'product_banner')
                                        <span class="text-info"> {{ trans('banners_trans.Product_Banner') }}</span>
                                    @elseif ($banner->banner_type == 'offer_banner')
                                        <span class="text-info"> {{ trans('banners_trans.Offer_Banner') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($banner->active == 1)
                                        <span class="text-success"> {{ trans('banners_trans.Active') }}</span>
                                    @else
                                        <span class="text-danger"> {{ trans('banners_trans.Inactive') }}</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $banner->title }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ Route('admin.banners.edit', $banner->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>




                                    <form action="{{ Route('admin.banners.destroy', $banner->id) }}" method="post"
                                        style="display:inline">
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
   

    var datatable = $('#custom_table').DataTable({
        stateSave: true,
        sortable: true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [1, 2]
                }
            },

            'colvis'
        ]
    });
</script>
@endsection