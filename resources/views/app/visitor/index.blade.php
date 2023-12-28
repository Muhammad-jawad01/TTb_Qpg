@extends('layout.master')

@section('title', 'Visitor')
@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Visitors') }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">

                            <!-- Datatable go to last page -->
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <h4 class="table-header">{{ __('Visitor Managment') }}</h4>
                                        </div>
                                        <div class="col-sm-2 text-right">
                                            @can('visitor-create')
                                                <a href="{{ route('visitors.create') }}" class="btn btn-primary">Create</a>
                                            @endcan
                                        </div>
                                    </div>



                                    <div class="table-responsive mb-4">
                                        <table id="last-page-dt" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Cnic</th>
                                                    <th>purpose</th>

                                                    <th>Department</th>
                                                    <th>print</th>

                                                    <th></th>
                                                </tr>
                                            </thead>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->


            <div class="modal" tabindex="-1" id="myModal" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Visitor Details</h5>

                        </div>
                        <div class="modal-body">
                            <form id="modalSubmit">
                                <input type="hidden" name="id" id="visitor_id" />

                                <div class="form-group">
                                    <select class="form-control" id="status" name="status">
                                        <option selected>Open this select </option>
                                        <option value="3">Accept</option>
                                        <option value="4">Reject</option>
                                    </select>
                                </div>

                                <div class="form-group" id="rejected_reason" style="display:none;">
                                    <input type="text" class="form-control mt-2" placeholder="Enter Rejecting Reason"
                                        name="rejected_reason">
                                </div>


                                <div class="row m-0 p-0 mt-2 ">
                                    <input type="time" class="form-control col-md-6" id="Mtime" name="visiting_time">
                                    <input type="date" id="start" class="form-control col-md-6 px-1 " id="Mdate"
                                        name="visiting_date" min="2023-01-01">
                                </div>

                                <div class="form-group float-right pt-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="Modelcancel">Cancel</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- Main Body Ends -->
    <!-- Button trigger modal -->


@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    {!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
    {!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
    {!! Html::script('plugins/fullcalendar/moment.min.js') !!}
@endpush

@push('custom-scripts')
    <script>
        $(document).ready(function() {

            var params = '';
            var i = 0;
            window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str, key, value) {
                if (i == 0) {
                    params += [key] + '=' + value;
                } else {
                    params += '&' + [key] + '=' + value;
                }
                i++;
            });


            if (params != '') {
                var url = "{{ route('visitors.index') }}?" + params;
            } else {
                var url = "{{ route('visitors.index') }}";
            }

            $('#last-page-dt').DataTable({
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "first": "<i class='las la-angle-double-left'></i>",
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>",
                        "last": "<i class='las la-angle-double-right'></i>"
                    }
                },
                "lengthMenu": [7, 14, 21, 28],
                "pageLength": 7,
                "ajax": url,
                "processing": true,
                "serverSide": true,
                "columns": [{
                        data: 'id',
                    },
                    {
                        data: 'user.name',
                        name: 'user.name',
                        orderable: false,
                    },

                    {
                        data: 'user.cnic',
                        orderable: false,
                    },
                    {
                        data: 'purpose',
                        orderable: false,
                    },
                    {
                        data: 'department.title',
                        orderable: false,
                        visible: "{{ Auth::user()->hasRole('Department') ? false : true }}"
                    },
                    {
                        data: null,
                        orderable: false,

                        render: function(data, type, row) {
                            var editUrl = "{{ route('visitor.print', ':id') }}";
                            editUrl = editUrl.replace(':id', data.id);
                            let verificationButton = data.status == 2 ? "{!! Auth::user()->hasRole('Department')
                                ? '<button class=\"btn btn-warning btn-sm modalAction \"  data-model=" + encodeURIComponent(JSON.stringify(data)) + "><i class=\"las la-check la-2x\" ></i></button>'
                                : '' !!}" :
                                '';
                            return "<a class=\"btn btn-primary btn-sm\"  href=\"" + editUrl +
                                "\"><i class=\"las la-print la-2x\"></i></a>" + verificationButton;

                        }

                    },



                    {
                        data: "action",
                        orderable: false,
                        searchable: false,
                    }

                ],



            });


            $('#status').change(function() {
                var value = $(this).val();
                if (value == 4) {
                    $("#rejected_reason").show();
                } else {
                    $("#rejected_reason").hide();
                }
            });


            $("#modalSubmit").submit(function(e) {
                e.preventDefault();
                let form = $("#modalSubmit");
                let formData = form.serializeArray();
                var token = $('input[name="_token"]').val();
                console.log(formData);
                $.ajax({
                    url: `/app/visitor-managment/visitors/${formData[0].value}`,
                    type: 'PUT',
                    // dataType: "JSON",
                    data: formData,
                    headers: {
                        'X-CSRF-Token': token
                    },
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonText: "Ok",
                                allowOutsideClick: false,
                            });
                            $("#myModal").modal('hide');
                            $('#last-page-dt').DataTable().ajax.reload();
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                                showCancelButton: false,
                                confirmButtonText: "Ok",
                                allowOutsideClick: false,
                            });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error",
                            showCancelButton: false,
                            confirmButtonText: "Ok",
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });
            });



        });


        $("#Modelcancel").on('click', function() {
            $("#myModal").modal('hide');
        });


        $(document).on('click', '.modalAction', function() {

            // getting current Object 
            let modelData = $(this).attr("data-model");
            modelData = JSON.parse(decodeURIComponent(modelData));
            $("#Mtime").val(modelData?.visiting_time);
            $("#Mdate").val(modelData?.visiting_date);
            var today = moment().format('dd/mm/yyyy');
            $('#Mdate').val(today);
            $("#visitor_id").val(modelData?.id);

            $("#myModal").modal("show");

        });
    </script>
@endpush
