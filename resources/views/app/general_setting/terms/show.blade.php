@extends('layout.genric')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item"><span>Home</span></li>
            <li class="breadcrumb-item active">
                <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
                    <span> <b>Show Term</b></span>
                </a>
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
                        <div class="card-header"><strong>Show Term</strong>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Term:</strong>
                                        {{ $model->name }}
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
