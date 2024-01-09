@extends('layout.genric')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                    class="text-decoration-none text-dark"><span>Home</span></a></li>
            <li class="breadcrumb-item"><a href="{{ route('mcqs.index') }}" class="text-decoration-none text-dark"><span>MCQ
                        Question</span></a></li>

            <li class="breadcrumb-item active">
                <span> <b> Create </b></span>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Create New Mcqs</strong>
                        </div>
                        <div class="card-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('mcqs.store') }}" method="POST">
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

                                    <div class="col-md-6 mt-3">

                                        <select name="subject_id" class="form-control">
                                            <option value="">Select subject</option>
                                            @foreach ($subject as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 mt-3 ">
                                        <select name="chapter_id" class="form-control">
                                            <option value="">Select Chapter</option>
                                            @foreach ($chapter as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div id="example1" class="mt-3">

                                    <div class="r-group">
                                        <p>
                                            {{-- <label for="question_0_0" data-pattern-text="question Name +=1:">question
                                                1:</label>
                                            <input type="text" name="question[0][question]" id="vehicle_0_name"
                                                class="form-control" data-pattern-name="question[++][question]"
                                                data-pattern-id="question_++_question" />
                                                 --}}

                                        <div class=" row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="vehicle_0_0" data-pattern-text="Question +=1:">Question
                                                        1:</label>

                                                    <textarea id="test" rows="2" cols="50" type="text" name="data[0][question]" id="vehicle_0_name"
                                                        class="form-control" data-pattern-name="data[++][question]" data-pattern-id="vehicle_++_name" />.</textarea>

                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <strong>Option 1:</strong>
                                                            <input type="text" name="data[0][option_1]"
                                                                id="vehicle_0_name" class="form-control"
                                                                data-pattern-name="data[++][option_1]"
                                                                data-pattern-id="vehicle_++_name" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <strong>Option 2:</strong>
                                                            <input type="text" name="data[0][option_2]"
                                                                id="vehicle_0_name" class="form-control"
                                                                data-pattern-name="data[++][option_2]"
                                                                data-pattern-id="vehicle_++_name" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <strong>Option 3:</strong>
                                                            <input type="text" name="data[0][option_3]"
                                                                id="vehicle_0_name" class="form-control"
                                                                data-pattern-name="data[++][option_3]"
                                                                data-pattern-id="vehicle_++_name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <strong>Option 4:</strong>
                                                            <input type="text" name="data[0][option_4]"
                                                                id="vehicle_0_name" class="form-control"
                                                                data-pattern-name="data[++][option_4]"
                                                                data-pattern-id="vehicle_++_name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <strong>Correct:</strong>
                                                            <input type="text" name="data[0][option_4]"
                                                                id="vehicle_0_name" class="form-control"
                                                                data-pattern-name="data[++][option_5]"
                                                                data-pattern-id="vehicle_++_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        </p>

                                        <p>
                                            <!-- Add a remove button for the item. If one didn't exist, it would be added to overall group -->
                                            <button class="r-btnRemove btn btn-danger btn-circle " type="button"><i
                                                    class="fa fa-times"></i></button>
                                        </p>


                                    </div>
                                    <button class="r-btnAdd btn btn-primary btn-circle " type="button"><i
                                            class="fa fa-plus-square"></i></button>
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

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/jquery.form-repeater.js') }}"></script>
    <script type="text/javascript">
        // $('#example1').repeater({
        //     btnAddClass: 'r-btnAdd',
        //     btnRemoveClass: 'r-btnRemove',
        //     groupClass: 'r-group',
        //     minItems: 1,
        //     maxItems: 0,
        //     startingIndex: 0,
        //     showMinItemsOnLoad: true,
        //     reindexOnDelete: true,
        //     repeatMode: 'append',
        //     animation: 'fade',
        //     animationSpeed: 400,
        //     animationEasing: 'swing',
        //     clearValues: true
        // }, [{
        //         "vehicle[0][name]": "test",
        //         "vehicle[0][type]": "test"
        //     },
        //     {
        //         "vehicle[1][name]": "test2",
        //         "vehicle[1][type]": "test2"
        //     }
        // ]);
    </script>
@endsection
