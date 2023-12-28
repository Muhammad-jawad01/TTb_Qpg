@extends('layout.master')

@section('title', 'Question Edit')
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __(' Question Edit ') }}</a>
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

                                    <form action="{{ route('questions.update', $model->id) }}" method="POST">
                                        @csrf

                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="class_id" class="form-control">
                                                    <option value="">Select Class</option>
                                                    @foreach ($classlevel as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $model->class_id == $value->id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="term_id" class="form-control">
                                                    <option value="">Select Term</option>
                                                    @foreach ($term as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $model->term_id == $value->id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <select name="subject_id" class="form-control">
                                                    <option value="">Select subject</option>
                                                    @foreach ($subject as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $model->subject_id == $value->id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-3 ">
                                                <select name="chapter_id" class="form-control">
                                                    <option value="">Select Chapter</option>
                                                    @foreach ($chapter as $value)
                                                        {{-- <option value="{{ $value->id }}">{{ $value->name }}</option> --}}
                                                        <option value="{{ $value->id }}"
                                                            {{ $model->chapter_id == $value->id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-3 ">

                                                {!! Form::select('type', questionTypes(), $model->type, ['class' => 'form-control', 'id' => 'question-type']) !!}


                                            </div>
                                        </div>

                                        <div class=" row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="" data-pattern-text="">Question</label>

                                                    <textarea id="ckEditor +=1" rows="3" cols="50" type="text" name="question" class="form-control editor">{{ $model->question }}</textarea>

                                                </div>
                                            </div>
                                            <div class="col-md-6 m_question">
                                                <div class="form-group">
                                                    <strong>Multi Part:</strong>

                                                    {!! Form::select('m_question', m_question(), $model->m_question, ['class' => 'form-control']) !!}



                                                </div>
                                            </div>
                                            <div class="col-md-6 difficulty_level">
                                                <div class="form-group">
                                                    <strong>Type:</strong>

                                                    {!! Form::select('difficulty_level', difficultylevel(), $model->difficulty_level, ['class' => 'form-control']) !!}




                                                </div>
                                            </div>
                                            <div class="col-md-6 correct_ans">
                                                <div class="form-group">
                                                    <strong>Correct Answer :</strong>
                                                    <input type="text"
                                                        name="correct_answer"class=" correct_ans form-control "
                                                        value="{{ $model->correct_answer }}">

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
            // $('.difficulty_level').hide();
            $('.correct_ans').hide();

            $('#question-type').change(function() {
                correct_difficulty_level()
            });
        });

        function correct_difficulty_level() {

            let questionType = $('#question-type').val();



            if (questionType == 1) {
                $('.correct_ans').show();
                $('.difficulty_level').show();
                $('.m_question').hide();


            } else {
                $('.difficulty_level').show();

                $('.correct_ans').hide();
                $('.m_question').show();

            }


        }

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
