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
                        class="default-color">{{ trans('categories_trans.Trash_Categories') }}</a></li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('categories_trans.Id') }}</th>
                            <th>{{ trans('categories_trans.Name') }}</th>
                            <th>{{ trans('categories_trans.Parent') }}</th>
                            <th>{{ trans('categories_trans.Status') }}</th>
                            <th>{{ trans('categories_trans.Created_at') }}</th>
                            <th>{{ trans('categories_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>

                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" height="50"
                                            width="50" alt="">
                                    @else
                                        <img src="{{ asset('backend/assets/images/profile-avatar.jpg') }}"
                                            height="50" width="50" alt="">
                                    @endif
                                </td>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent_id }}</td>
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
                                <td>{{ $category->created_at }}</td>

                                <td>
                                    <form action="{{Route('backend.categories.restore',$category ->id)}}" method="post" style="display:inline">
                                        @csrf
                                        @method('put')
                                        
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-edit"></i>
                                            إعادة
                                        </button>   
                                    </form>
                                   
                                    <form action="{{Route('backend.categories.forceDelete',$category ->id)}}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        
                                        <button type="submit" class="btn btn-danger btn-sm" >
                                            <i class="fa fa-trash"></i> 
                                            حذف نهائى
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
