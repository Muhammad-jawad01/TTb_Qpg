@extends('layout.master')

@section('title', 'Question Paper ')
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __(' Question Paper') }}</a>
                                </li>
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
                                            <h4 class="table-header">{{ __(' Question Paper') }}</h4>
                                        </div>
                                        <div class="col-sm-2 text-right">
                                            @can('paper-create')
                                                <a class="btn btn-primary" href="{{ route('papers.create') }}">
                                                    Create</a>
                                            @endcan
                                        </div>



                                        <div class="table-responsive mb-4">
                                            <table id="last-page-dt" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Paper</th>
                                                        <th>Class</th>
                                                        <th>Subject</th>
                                                        <th>Term</th>
                                                        <th width="30px">Action</th>
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
    </div>

    {{-- edit --}}


@endsection
@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
@endpush

@push('custom-scripts')
    <script>
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
                "ajax": "{{ route('papers.index') }}",
                "processing": true,
                "serverSide": true,
                "columns": [{
                        data: 'id',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'class.name',
                    },
                    {
                        data: 'subject.name',
                    },

                    {
                        data: 'term.name',
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
