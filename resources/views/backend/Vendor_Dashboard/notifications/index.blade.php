@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('notifications_trans.Notifications') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('notifications_trans.Notifications') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('notifications_trans.All_Notifications') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('notifications_trans.Notifications') }}</li>
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
                            <th>{{ trans('notifications_trans.Notification') }}</th>
                            <th>{{ trans('notifications_trans.Vendor_Name') }}</th>
                            <th>{{ trans('notifications_trans.Notification_Status') }}</th>
                            <th>{{ trans('notifications_trans.Read_At') }}</th>
                            <th>{{ trans('notifications_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                            <tr>

                                <?php
                                $data = json_decode($notification->data);
                                $body = $data->body;
                                ?>
                                <td>
                                    {{ $body }}
                                </td>
                                <td>
                                    {{ $notification->vendor->name }}
                                </td>
                                <td>
                                    @if ($notification->read_at == null)
                                        <span class="text-danger">
                                            {{ trans('notifications_trans.Unread') }}
                                        </span>
                                    @else
                                        <span class="text-success">
                                            {{ trans('notifications_trans.Read') }}
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $notification->read_at }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
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
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },

                'colvis'
            ]
        });
    });
</script>
@endsection