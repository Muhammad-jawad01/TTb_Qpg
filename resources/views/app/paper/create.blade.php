@extends('layout.master')

@section('title', 'Paper Create')
@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/editors/ckeditor/style.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __(' Paper Create ') }}</a>
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
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h4 class="table-header">{{ __('Paper Question') }}</h4>
                                            </div>
                                            <div class="col-sm-2 text-right"> <a href="{{ route('papers.index') }}"
                                                    class="btn btn-primary">Back</a></div>
                                        </div>
                                    </div>
                                    <form action="{{ route('papers.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="class_id" class="form-control">
                                                    <option value="">Select Class</option>
                                                    @foreach ($classlevel as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="term_id" class="form-control">
                                                    <option value="">Select Term</option>
                                                    @foreach ($term as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 ">
                                                <select name="subject_id" class="form-control">
                                                    <option value="">Select subject</option>
                                                    @foreach ($subject as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label>Paper name</label>

                                                    <textarea id="ckEditor" placeholder="Paper name" rows="3" cols="50" type="text" name="name"
                                                        class="form-control editor"></textarea>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <strong>Time Allowed:</strong>

                                                    <input type="number" class="form-control" name="time_allowed">
                                                    {{-- <select class="form-control" name="time_allowed">
                                                        <option> Time Allowed For Paper</option>
                                                        <option value="3">3Hr</option>
                                                        <option value="2">2Hr</option>
                                                        <option value="1">1Hr</option>

                                                    </select> --}}

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <strong>Marks:</strong>

                                                    {{-- <input type="text" class="form-control" name="marks"> --}}
                                                    <input type="number" class="form-control" name="marks">
                                                    {{-- <option>Total Marks</option>
                                                        <option value="100">100</option>
                                                        <option value="75">75</option>
                                                        <option value="50">50</option>

                                                    </select> --}}
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                                                <div class="form-group">
                                                    <strong>Paper Type:</strong>

                                                    {{-- <input type="text" class="form-control" name="papertype"> --}}
                                                    <select class="form-control" name="papertype">
                                                        <option> Paper Type</option>
                                                        <option value="english">English</option>
                                                        <option value="urdu">Urdu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                                                <div class="form-group">
                                                    <strong>Type Online Submissio Or Nromal:</strong>

                                                    {{-- <input type="text" class="form-control" name="papertype"> --}}
                                                    <select class="form-control" name="type">
                                                        <option>Type Online Submissio Or Nromal</option>
                                                        <option value="Submit_Online">Submit Online</option>
                                                        <option value="Submit_Offline">Submit Offline</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                                                <div class="form-group">
                                                    <strong>Session:</strong>

                                                    <input type="text" id="date" min="2023" step="1"
                                                        class="form-control" name="session">

                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>


                                    </form>

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
    <script type="text/javascript">
        $(document).ready(function() {
            applyEditor();
        });

        function applyEditor() {
            $('.editor').each(function(index) {
                applyEditorOnId(this.id);
            });
        }

        function applyEditorOnId(id) {
            CKEDITOR.replace(id, {
                filebrowserUploadUrl: "{{ route('upload_image', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
        }
    </script>
@endpush
