@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('categories_trans.Categories') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('categories_trans.Categories') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('categories_trans.All_Categories') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('categories_trans.Categories') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<x-backend.alert type="info" />

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('categories_trans.Id') }}</th>
                            <th>{{ trans('categories_trans.Name') }}</th>
                            <th>{{ trans('categories_trans.Parent') }}</th>
                            <th>{{ trans('categories_trans.Number_Of_Products') }}</th>
                            <th>{{ trans('categories_trans.Status') }}</th>
                            <th>{{ trans('categories_trans.Featured') }}</th>
                            <th>{{ trans('categories_trans.Created_at') }}</th>
                            <th>{{ trans('categories_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <img src="{{ $category->image_url }}" height="50" width="50" alt="">
                                </td>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a href="{{ Route('admin.categories.show', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </td>
                                <td>{{ $category->parent->name }}</td>
                                <td>
                                    <a href="{{ Route('admin.categories.show', $category->id) }}">
                                        {{ $category->products_count }}
                                    </a>
                                </td>
                                <td>
                                    @if ($category->status == 'active')
                                        <span class="badge badge-rounded badge-success p-2 mb-2">
                                            {{ trans('categories_trans.Active') }}
                                        </span>
                                    @elseif($category->status == 'inactive')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('categories_trans.Inactive') }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->featured == '1')
                                        <span class="badge badge-rounded badge-success p-2 mb-2">
                                            {{ trans('categories_trans.Featured') }}
                                        </span>
                                    @elseif($category->featured == '0')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('categories_trans.Not_Featured') }}
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $category->created_at }}</td>

                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.categories.destroy', $category->id) }}"
                                        method="post" style="display:inline">
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
