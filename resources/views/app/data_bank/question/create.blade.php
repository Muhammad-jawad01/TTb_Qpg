@extends('layout.master')

@section('title', 'Question Create')
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __(' Question Create ') }}</a>
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
                                                <h4 class="table-header">{{ __('Create Question') }}</h4>
                                            </div>
                                            <div class="col-sm-2 text-right"> <a href="{{ route('questions.index') }}"
                                                    class="btn btn-primary">Back</a></div>
                                        </div>
                                    </div>
                                    <form action="{{ route('questions.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="class_id" class="form-control">
                                                    <option value="">Select Class</option>
                                                    @foreach ($classlevel as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="term_id" class="form-control">
                                                    <option value="">Select Term</option>
                                                    @foreach ($term as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-3">
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
                                        <div id="example1" class="mt-3">
                                            <div class="r-group">
                                                <p>

                                                <div class=" row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="vehicle_0_0"
                                                                data-pattern-text="Question +=1:">Question
                                                                1:</label>

                                                            <textarea id="ckEditor +=1" rows="3" cols="50" type="text" name="data[0][question]"
                                                                class="form-control editor" data-pattern-name="data[++][question]" data-pattern-id="vehicle_++_name">

                                                               </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 m_question">
                                                        <div class="form-group">
                                                            <strong>Multi Part:</strong>


                                                            <select class="form-select m_question form-control"
                                                                name="data[0][m_question]"
                                                                data-pattern-name="data[++][m_question]"
                                                                data-pattern-id="vehicle_++_name">
                                                                <option value="" selected disabled hidden>Choose
                                                                    Type</option>
                                                                <option value="0">No</option>
                                                                <option value="1">Yes</option>

                                                            </select>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 difficulty_level">
                                                        <div class="form-group">
                                                            <strong> Difficulty Level :</strong>


                                                            <select class="form-select difficulty_level form-control"
                                                                name="data[0][difficulty_level]"
                                                                data-pattern-name="data[++][difficulty_level]"
                                                                data-pattern-id="vehicle_++_name">
                                                                <option value="" selected disabled hidden>Choose
                                                                    Type</option>
                                                                <option value="Easy">Easy</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Hard">Hard</option>
                                                            </select>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 correct_ans">
                                                        <div class="form-group">
                                                            <strong>Correct Answer :</strong>
                                                            <input type="text" name="data[0][correct_answer ]"
                                                                class=" correct_ans form-control "
                                                                data-pattern-name="data[++][correct_answer]"
                                                                data-pattern-id="vehicle_++_name">

                                                        </div>
                                                    </div>


                                                </div>

                                                </p>

                                                <p>
                                                    <!-- Add a remove button for the item. If one didn't exist, it would be added to overall group -->
                                                    <button class="r-btnRemove btn btn-danger btn-circle "
                                                        type="button"><i class="la la-times"></i></button>
                                                </p>


                                            </div>
                                            <button class="r-btnAdd btn btn-primary btn-circle " type="button"
                                                id="addBtn"><i class="la la-plus"></i></button>
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
    <script>
        $(document).ready(function() {
            applyEditor();
            $(".difficulty_level").hide();
            $(".correct_ans").hide();

            $("#question-type").change(function() {
                correct_difficulty_level();
                const questionType = $(this).val();
                if (questionType == 1) {
                    applyEditor(true);
                } else {
                    applyEditor(false);
                }
            });

        });

        function correct_difficulty_level() {

            let questionType = $('#question-type').val();



            if (questionType == 1) {
                $('.correct_ans').show();
                applyEditor(true);


                $('.difficulty_level').show();
                $('.m_question').hide();


            } else {
                $('.difficulty_level').show();

                $('.correct_ans').hide();

            }


        }

        function applyEditor(isMcqs = false) {
            for (name in CKEDITOR.instances) {
                CKEDITOR.instances[name].destroy(true);
            }
            $('.editor').each(function(index) {
                applyEditorOnId(this.id, isMcqs);

            });
        }


        function applyEditorOnId(id, isMcqs = false) {
            let editor = CKEDITOR.replace(id, {
                filebrowserUploadUrl: "{{ route('upload_image', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });

            if (isMcqs == true) {
                editor.setData(
                    '<table style="width: 100%; border:1px solid black"><tr><td></td><td></td><td></td><td></td><td></td></tr></table>'
                );
            }

        }

        $('#example1').repeater({

            btnAddClass: 'r-btnAdd',
            btnRemoveClass: 'r-btnRemove',
            groupClass: 'r-group',
            minItems: 0,
            maxItems: 0,
            startingIndex: 0,
            showMinItemsOnLoad: true,
            reindexOnDelete: true,
            repeatMode: 'append',
            animation: 'fade',
            animationSpeed: 400,
            animationEasing: 'swing',
            clearValues: true,
            afterAdd: function($doppleganger) {
                var numItems = $('.editor').length - 1;
                let text_area_id = "vehicle_" + numItems + "_name";
                applyEditorOnId(text_area_id);
                correct_difficulty_level();

            },
        }, [{
                "vehicle[0][name]": "test",
                "vehicle[0][type]": "test"
            },
            {
                "vehicle[1][name]": "test2",
                "vehicle[1][type]": "test2"
            }
        ]);
    </script>
    <style>
        table {}
    </style>
@endpush
