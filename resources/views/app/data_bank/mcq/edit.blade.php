@extends('layout.genric')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                    class="text-decoration-none text-dark"><span>Home</span></a></li>
            <li class="breadcrumb-item"><a href="{{ route('mcqs.index') }}" class="text-decoration-none text-dark"><span>MCQ
                        Question</span></a></li>
            <li class="breadcrumb-item active">
                <span> <b> Edit </b></span>
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
                        <div class="card-header"><strong>Edit New User</strong>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
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

                            <form action="{{ route('mcqs.update', $model->id) }}" method="POST">
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
                                    <div class="col-md-6 mt-3">
                                        <select name="subject_id" class="form-control">
                                            <option value="">Select subject</option>
                                            @foreach ($subject as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ $model->subject_id == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3 ">
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
                                </div>
                                <div id="example1" class="mt-3">
                                    <div class="r-group">
                                        <p>


                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="vehicle_0_0" data-pattern-text="Question +=1:">Question
                                                    1:</label>

                                                <textarea id="test" rows="4" cols="50" type="text" name="data[0][question]" id="vehicle_0_name"
                                                    class="form-control" data-pattern-name="data[++][question]" data-pattern-id="vehicle_++_name" />{{ $model->question }}</textarea>

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <strong>Option 1:</strong>
                                                        <input type="text" name="data[0][option_1]" id="vehicle_0_name"
                                                            class="form-control" data-pattern-name="data[++][option_1]"
                                                            data-pattern-id="vehicle_++_name"
                                                            value="{{ $model->option_1 }}" />

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <strong>Option 2:</strong>
                                                        <input type="text" name="data[0][option_2]" id="vehicle_0_name"
                                                            class="form-control" data-pattern-name="data[++][option_2]"
                                                            data-pattern-id="vehicle_++_name"
                                                            value="{{ $model->option_2 }}" />

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <strong>Option 3:</strong>
                                                        <input type="text" name="data[0][option_3]" id="vehicle_0_name"
                                                            class="form-control" data-pattern-name="data[++][option_3]"
                                                            data-pattern-id="vehicle_++_name"
                                                            value="{{ $model->option_3 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <strong>Option 4:</strong>
                                                        <input type="text" name="data[0][option_4]" id="vehicle_0_name"
                                                            class="form-control" data-pattern-name="data[++][option_4]"
                                                            data-pattern-id="vehicle_++_name"
                                                            value="{{ $model->option_4 }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        </p>


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
@endsection
