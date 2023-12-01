@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('stores_trans.Stores') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('stores_trans.Stores') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('stores_trans.All_Stores') }}</a></li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('stores_trans.Id') }}</th>
                            <th>{{ trans('stores_trans.Name') }}</th>
                            <th>{{ trans('stores_trans.Slug') }}</th>
                            <th>{{ trans('stores_trans.Categories') }}</th>
                            <th>{{ trans('stores_trans.Number_Of_Products') }}</th>
                            <th>{{ trans('stores_trans.Status') }}</th>
                            <th>{{ trans('stores_trans.Created_at') }}</th>
                            <th>{{ trans('stores_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stores as $store)
                            <tr>
                                <td>
                                    <img src="{{ asset($store->logo_image_url) }}" height="50" width="50"
                                        alt="">
                                </td>
                                <td>{{ $store->id }}</td>
                                <td>{{ $store->name }}</td>
                                <td>{{ $store->slug }}</td>
                                <td>
                                    @foreach ($store->categories as $category)
                                        <span
                                            class="badge badge-rounded badge-dark p-2 mb-2">{{ $category->name }}</span>
                                    @endforeach
                                </td>

                                <td>
                                    <a href="{{ Route('admin.stores.show', $store->id) }}">
                                        {{ $store->products_count }}
                                    </a>
                                </td>
                                <td>
                                    @if ($store->status == 'active')
                                        <span class="badge badge-rounded badge-success p-2 mb-2">
                                            {{ trans('stores_trans.Active') }}
                                        </span>
                                    @elseif($store->status == 'inactive')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('stores_trans.Inactive') }}
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $store->created_at }}</td>

                                <td>
                                    <a href="{{ Route('admin.stores.show', $store->id) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.stores.edit', [$store->id]) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.stores.destroy', $store->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                    {{-- <a href="" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> 
                                    
                                </a>     --}}
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
