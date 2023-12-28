{{--  --}}

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
                                                <h4 class="table-header">{{ __('Paper Edit') }}</h4>
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
                                                        {{ $paper->class_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="term_id" class="form-control">
                                                    <option value="">Select Term</option>
                                                    @foreach ($term as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $paper->term_id == $value->id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 ">
                                                <select name="subject_id" class="form-control">
                                                    <option value="">Select subject</option>
                                                    @foreach ($subject as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $paper->subject_id == $value->id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label>Paper name</label>

                                                    <textarea id="ckEditor" placeholder="Paper name" rows="3" cols="50" type="text" name="name"
                                                        class="form-control editor">{{ $paper->name }}</textarea>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 mt-2">
                                                <div class="form-group">
                                                    <strong>Time Allowed:</strong>

                                                    <input type="text" class="form-control" name="time_allowed"
                                                        value="{{ $paper->time_allowed }} hr">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 mt-2">
                                                <div class="form-group">
                                                    <strong>Marks:</strong>

                                                    <input type="text" class="form-control" name="marks"
                                                        value="{{ $paper->marks }}">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 mt-2">
                                                <div class="form-group">
                                                    <strong>Paper Type:</strong>

                                                    {!! Form::select('papertype', paperTypes(), $paper->papertype, ['class' => 'form-control']) !!}

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 mt-2">
                                                <div class="form-group">
                                                    <strong>Session:</strong>

                                                    <input type="number" id="date" min="2023" step="1"
                                                        value="2023" max="2099" class="form-control" name="session"
                                                        value="{{ $paper->session }}">

                                                </div>
                                            </div>
                                        </div>




                                        <div
                                            class="col-xs-12
                                                            col-sm-12 col-md-12 text-center mt-3">
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
