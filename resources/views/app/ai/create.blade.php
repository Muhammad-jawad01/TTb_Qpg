@extends('layout.master')

@section('title', 'AI Base Questions Create')
@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/editors/ckeditor/style.css') !!}
@endpush

@section('content')
    {{-- <div id="loader" style="display: none;">
        Loading...
    </div> --}}

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
                                <li class="breadcrumb-item"><a
                                        href="javascript:void(0);">{{ __(' AI Base Questions Create') }}</a>
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
                                                <h4 class="table-header">{{ __('AI Base Questions Create') }}</h4>
                                            </div>
                                            <div class="col-sm-2 text-right"> <a href="{{ route('ai.question.list') }}"
                                                    class="btn btn-primary">Back</a></div>
                                        </div>
                                    </div>
                                    <form id="ai-question-form" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label>Paragraph</label>

                                                    <textarea id="ckEditor" placeholder="Paragraph" rows="3" cols="50" type="text" name="paragraph"
                                                        class="form-control editor"></textarea>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label>Number Of Question</label>

                                                    <input type="number" class="form-control" name="num_question">
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

                        <div class="row layout-top-spacing date-table-container">
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                    <form action="{{ route('save.ai.response') }}" method="POST">
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
                                            <div class="col-md-4 mt-3 ">
                                                <select name="chapter_id" class="form-control">
                                                    <option value="">Select Chapter</option>
                                                    @foreach ($chapter as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-3 ">
                                                <select name="type" id="question-type" d-sn="1"
                                                    class="form-control">
                                                    <option value="">Select Question Type</option>
                                                    <option value="1">Mcq</option>
                                                    <option value="2">Short Question</option>
                                                    <option value="3">Long Question</option>



                                                </select>
                                            </div>
 


                                        </div>
                                        <div class="col-md-12 mt-5" id="ai-question-response">


                                        </div>
                                        <input type="hidden" name="paragraph_save" id="ai-question-response11">
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                            <button type="submit" class="btn btn-primary">Save AI Response</button>
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

        $(document).ready(function() {
            $('#ai-question-form').submit(function(e) {
                e.preventDefault();
                $('#loader').show();

                $.ajax({
                    // url: "{{ route('ai.question.search') }}",
                    url: "{{ route('ai.question.search') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        // Display the response
                        $('#ai-question-response').html(response);
                        $('#ai-question-response11').val(response);

                    },
                    error: function(error) {
                        // Handle the error
                        $('#ai-question-response').html(
                            'Error: Could not get response from Gemini AI.');
                    }

                    // complete: function() {
                    //     // Hide loader after the request is completed
                    //     $('#loader').hide();
                    // }
                });
            });
        });
    </script>
@endpush
