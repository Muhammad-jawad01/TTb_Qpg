@extends('layout.master')

@section('title', 'Paper Create')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/editors/ckeditor/style.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    {{-- <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __(' Part Create ') }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div> --}}
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
                                <div class="col-md-12">
                                    <h6 class="d-flex"><b class="mx-1"> {!! $paper->name !!} </b> <span>
                                            for the <b>{!! $paper->class->name !!}</b> and the
                                            subject is
                                            <b>{!! $paper->subject->name !!}</b> session <b>{!! $paper->session !!}</b> created on
                                            <b>{!! $paper->created_at->format('d-m-Y') !!}</b>
                                        </span>
                                    </h6>
                                </div>
                                <div class="widget-content widget-content-area br-6">

                                    <div class="col-md-12">

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h4 class="table-header">{{ __('Create Part') }}</h4>
                                            </div>
                                            <div class="col-sm-2 text-right"> <a href="{{ route('papers.index') }}"
                                                    class="btn btn-primary">Back</a></div>
                                        </div>
                                    </div>
                                    <form action="{{ route('papers.store.part') }}" method="POST" id="part_question">
                                        @csrf

                                        <div class=" row mb-3">
                                            <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                                                <div class="form-group">
                                                    <strong>Paper part Name:</strong>
                                                    {{-- <input type="text" name="name" class="form-control"
                                                        id=""> --}}
                                                    <input type="text" name="name" class="form-control"
                                                        list="p_part" />
                                                    <datalist id="p_part">
                                                        <option>A</option>
                                                        <option>B</option>
                                                        <option>C</option>
                                                        <option>الف</option>
                                                        <option>ب</option>
                                                        <option>ج</option>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                                                <div class="form-group">
                                                    <strong>Question in Part:</strong>

                                                    <input type="text" class="form-control" name="question_in_part">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                                                <div class="form-group">
                                                    <strong>Attempt Question in Part:</strong>

                                                    <input type="text" class="form-control" name="attempt_question">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                                                <div class="form-group">
                                                    <strong>Time Allowed for Part:</strong>

                                                    <input type="text" class="form-control" name="time_allowed">
                                                    <input type="hidden" name="paper_id" value="{{ $paper->id }}">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                                                <div class="form-group">
                                                    <strong>Total Marks for Part:</strong>

                                                    <input type="number" class="form-control" min="0" name="marks">
                                                </div>
                                            </div>


                                        </div>


                                        <livewire:questions :paper="$paper" />



                                    </form>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                        <button type="submit" form="part_question" class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>








@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/js/jquery.form-repeater.js') }}"></script>
    <script src="{{ asset('plugins/editors/ckeditor/ckeditor.js') }}"></script>
@endpush
@push('custom-scripts')
@endpush
