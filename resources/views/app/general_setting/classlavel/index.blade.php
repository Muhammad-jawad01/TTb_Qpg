@extends('layout.master')

@section('title', 'Class ')
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Class') }}</a></li>
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
                                            <h4 class="table-header">{{ __('Class Management') }}</h4>
                                        </div>
                                        <div class="col-sm-2 text-right">
                                            @can('class-create')

                                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                                data-target="#exampleModal">
                                                Create
                                            </button>
                                            @endcan

                                        </div>



                                        <div class="table-responsive mb-4">
                                            <table id="last-page-dt" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th width="20px">No</th>
                                                        <th>Name</th>
                                                        <th width="20px">Action</th>
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
            </div>
        </div>
        <div class="col-lg-12   mt-5 mb-2 ">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Class
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['route' => 'classlevels.store', 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save
                            </button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>

        {{-- edit --}}

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['classlevelupdate']]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'id' => 'name', 'class' => 'form-control']) !!}
                                    {!! Form::hidden('id', null, ['id' => 'id']) !!}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    @endsection
    @push('plugin-scripts')
        {!! Html::script('assets/js/loader.js') !!}
        {!! Html::script('plugins/table/datatable/datatables.js') !!}
    @endpush

    @push('custom-scripts')
        <script>
            function foo(e) {

                let id = $(e).attr('data-id');
                let name = $(e).attr('data-name');
                // alert(id + '-' + name);
                $("#id").val(id);
                $('#name').val(name);
            }
            $(document).ready(function() {
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
                    "ajax": "{{ route('classlevels.index') }}",
                    "processing": true,
                    "serverSide": true,
                    "columns": [{
                            data: 'id',
                        },
                        {
                            data: 'name',
                        },
                        {
                            data: "action",
                            rderable: false,
                            searchable: false,
                        }
                    ],

                });



            });
        </script>
    @endpush
