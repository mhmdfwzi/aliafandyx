<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include common scripts used in most of your views -->
<script src="{{ URL::asset('backend/assets/js/plugins-jquery.js') }}"></script>
<script>
    var plugin_path = '{{ asset('backend/assets/js/') }}';
</script>
<script src="{{ URL::asset('backend/assets/js/datepicker.js') }}" defer></script>
{{-- <script src="{{ URL::asset('backend/assets/js/toastr.js') }}"></script> --}}
{{-- <script src="{{ URL::asset('backend/assets/js/validation.js') }}" defer></script> --}}
<script src="{{ URL::asset('backend/assets/js/custom.js') }}"></script>
<script src="{{ URL::asset('backend/assets/js/summernote-lite.min.js') }}" defer></script>

<script>
    const userID = "{{ auth('admin')->id() }}";
    console.log(userID);
</script>

<script>
    // Initialize the summernote editor
    $('#summernote').summernote({
        placeholder: 'Hello ..!',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'video']],
            ['view', ['codeview', 'help']]
        ]
    });
</script>

{{-- @include('sweetalert::alert') --}}

<script>
    @if (session('toast_success'))
        toastr.success("{{ session('toast_success') }}", "", {
            "timeOut": 1000
        }); // Set timeOut to 1000 milliseconds (1 second)
    @endif
</script>


@if (request()->routeIs('admin.brands.index') ||
        request()->routeIs('admin.categories.index') ||
        request()->routeIs('admin.stores.index') ||
        request()->routeIs('admin.vendors.index') ||
        request()->routeIs('admin.products.index') ||
        request()->routeIs('admin.product_variants.index') ||
        request()->routeIs('admin.orders.index') ||
        request()->routeIs('admin.deliveries.index') ||
        request()->routeIs('admin.product_properties.index') ||
        request()->routeIs('admin.attributes.index') ||
        request()->routeIs('admin.attribute_values.index') ||
        request()->routeIs('admin.coupons.index') ||
        request()->routeIs('admin.roles.index') ||
        request()->routeIs('admin.admins.index') ||
        request()->routeIs('admin.reports.orders') ||
        request()->routeIs('admin.websiteParts.index') ||
        request()->routeIs('admin.banners.index') ||
        request()->routeIs('admin.paymentGateways.index') ||
        request()->routeIs('delivery.orders.index') ||
        request()->routeIs('vendor.products.index') ||
        request()->routeIs('vendor.orders.index') ||
        request()->routeIs('vendor.attributes.index') ||
        request()->routeIs('vendor.attribute_values.index') ||
        request()->routeIs('vendor.product_variants.index') ||
        request()->routeIs('vendor.product_variants.create') ||
        request()->routeIs('vendor.coupons.index') ||
        request()->routeIs('vendor.notifications.index'))
    <script src="{{ asset('backend/assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/buttons.flash.min.js') }}" defer></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/pdfmake.min.js') }}" defer></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/vfs_fonts.js') }}" defer></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/buttons.print.min.js') }}" defer></script>
@endif



@if (request()->routeIs('admin.brands.create') ||
        request()->routeIs('admin.brands.edit') ||
        request()->routeIs('admin.categories.create') ||
        request()->routeIs('admin.categories.edit') ||
        request()->routeIs('admin.stores.create') ||
        request()->routeIs('admin.stores.edit') ||
        request()->routeIs('admin.vendors.create') ||
        request()->routeIs('admin.vendors.edit') ||
        request()->routeIs('admin.products.create') ||
        request()->routeIs('admin.products.edit') ||
        request()->routeIs('admin.product_variants.create') ||
        request()->routeIs('admin.orders.create') ||
        request()->routeIs('admin.deliveries.create') ||
        request()->routeIs('admin.product_properties.create') ||
        request()->routeIs('admin.attributes.create') ||
        request()->routeIs('admin.attribute_values.create') ||
        request()->routeIs('admin.coupons.create') ||
        request()->routeIs('admin.roles.create') ||
        request()->routeIs('admin.admins.create') ||
        request()->routeIs('admin.reports.orders') ||
        request()->routeIs('admin.websiteParts.create') ||
        request()->routeIs('admin.banners.create') ||
        request()->routeIs('delivery.orders.create'))
@endif

{{-- 
    @if (App::getLocale() == 'ar')
        <script>
            $(document).ready(function() {

                var datatable = $('#custom_table').DataTable({
                    stateSave: true,
                    sortable: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'print'
                    ]
                    // responsive: true,
                    // oLanguage: {
                    //     sZeroRecords: 'لا يوجد سجل متتطابق',
                    //     sEmptyTable: 'لا يوجد بيانات في الجدول',
                    //     oPaginate: {
                    //         sFirst: "First",
                    //         sLast: "الأخير",
                    //         sNext: "التالى",
                    //         sPrevious: "السابق"
                    //     },
                    // },

                });
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#custom_table').DataTable({
                    stateSave: true,
                    sortable: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'print'
                    ]
                    // responsive: true,
                    // oLanguage: {
                    //     sZeroRecords: 'No matching records found',
                    //     sEmptyTable: 'No data available in table',
                    //     oPaginate: {
                    //         sFirst: "First",
                    //         sLast: "Last",
                    //         sNext: "Next",
                    //         sPrevious: "Previous"
                    //     },
                    // },

                });
            });
        </script>
    @endif 
--}}




@yield('js')