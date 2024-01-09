@extends('layout.genric')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                    class="text-decoration-none text-dark"><span>Home</span></a></li>
            <li class="breadcrumb-item"><a href="{{ route('shortQuestions.index') }}"
                    class="text-decoration-none text-dark"><span>Short
                        Question</span></a></li>

            <li class="breadcrumb-item active">
                <span> <b> Show </b></span>
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
                        <div class="card-header"><strong>Show Question</strong>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Question:</strong>
                                        {{ $modal->question }}
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
