@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('destinations_trans.Destinations') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('destinations_trans.Destinations') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('destinations_trans.All_Destinations') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('destinations_trans.Destinations') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<x-backend.alert type="info" />
{{-- <a href="{{ Route('admin.destinations.create') }}" class="btn btn-sm btn-outline-primary">Create</a> --}}
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('destinations_trans.Place_Name') }}</th>
                            <th>{{ trans('destinations_trans.Charge_Amount') }}</th> 
                            <th>{{ trans('destinations_trans.Parent_Id') }}</th> 
                            <th>{{ trans('destinations_trans.Parent') }}</th> 
     
                            <th>{{ trans('destinations_trans.Control') }}</th> 
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destinations as $destination)
                            <tr> 
                                <td>{{ $destination->id }}</td>
                                <td>{{ $destination->name }}</td> 
                                <td>{{ $destination->price }}</td> 
                                <td>{{ $destination->parent_id}}</td> 
                                <td>{{ $destination->parent->name ?? '' }}</td> 
                               
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.destinations.edit', $destination->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.destinations.destroy', $destination->id) }}"
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
