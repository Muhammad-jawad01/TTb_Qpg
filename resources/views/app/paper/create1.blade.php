@extends('layout.genric')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                    class="text-decoration-none text-dark"><span>Home</span></a></li>
            <li class="breadcrumb-item"><a href="{{ route('Questionpaper.index') }}"
                    class="text-decoration-none text-dark"><span>Paper</span></a></li>
            <li class="breadcrumb-item active">
                <span> <b> Create</b></span>
            </li>
        </ol>
    </nav>
@endsection
@php
    
    function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);
    
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400));
    }
    
    function setSelected($value)
    {
        if ($value == Request()->training_for) {
            return 'selected';
        }
    }
    $dt = new DateTime();
    $i = 1;
@endphp
<style>
    .theadSection {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 20px;
    }
</style>

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Create New Paper</strong>
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
                            <form action="{{ route('Questionpaper.create') }}" method="Get">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($classlevel as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="term_id" class="form-control">
                                            <option value="">Select Term</option>
                                            @foreach ($term as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="subject_id" class="form-control">
                                            <option value="">Select subject</option>
                                            @foreach ($subject as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        <div class="form-group">

                                            <input type="text"class="form-control" placeholder="Limit" name="limit">
                                        </div>
                                    </div>
                                </div>




                                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Get Question Paper</button>
                                </div>


                            </form>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header"><strong> Paper Question</strong>
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
                            <form action="{{ route('Questionpaper.store') }}" method="POST">
                                @csrf


                                <div class="row">
                                    <div class="topheader">
                                        <p>Paper Model</p>
                                        <p>English (Compulsory) Paper -XI</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        <div class="form-group">

                                            <strong>Paper name:</strong>
                                            <input type="text" class="form-control" name="paper">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <strong>Class</strong>
                                            <h6>{{ array_key_exists('class', $reqdata) ? $reqdata['class'] : '' }}</h6>

                                            <input type="hidden" class="form-control" name="class_id"
                                                value="{{ array_key_exists('class_id', $reqdata_id) ? $reqdata_id['class_id'] : '' }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <strong>Subject</strong>
                                            <h6>{{ $reqdata['subject'] }}</h6>

                                            <input type="hidden" class="form-control" name="subject_id"
                                                value="{{ array_key_exists('subject_id', $reqdata_id) ? $reqdata_id['subject_id'] : '' }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <strong>Term</strong>
                                            <h6>{{ array_key_exists('term', $reqdata) ? $reqdata['term'] : '' }}</h6>

                                            <input type="hidden" class="form-control" name="term_id"
                                                value="{{ array_key_exists('term_id', $reqdata_id) ? $reqdata_id['term_id'] : '' }}"
                                                readonly>
                                        </div>
                                    </div>

                                </div>

                                <p><strong>MCQ Question</strong></p>

                                @foreach ($model['mcq'] as $key => $data)
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-5">
                                            <div class="form-group">
                                                <strong>{{ $i++ }}.</strong>
                                                <p>{{ $data->question }}</p>
                                                <input type="hidden" class="form-control" name="mquestion[]"
                                                    value="{{ $data->question }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="row mt-4">
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <strong>A:</strong>
                                                        {{ $data->option_1 }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <strong>B:</strong>
                                                        {{ $data->option_2 }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <strong>C:</strong>
                                                        {{ $data->option_3 }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <strong>D:</strong>
                                                        {{ $data->option_4 }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @endforeach

                                <p><strong>Short Question</strong></p>

                                @foreach ($model['shortQ'] as $key => $data)
                                    <div class="form-group">
                                        <strong>Question:</strong>
                                        <input type="text" class="form-control" name="squestion[]"
                                            value="{{ $data->question }}" readonly>
                                    </div>
                                @endforeach
                                <p><strong>Long Question</strong></p>
                                @foreach ($model['longQ'] as $key => $data)
                                    <div class="form-group">
                                        <strong>Q:</strong>
                                        <p>Part: {{ $data->part }}</p>
                                        <input type="text" class="form-control" name="lquestion[]"
                                            value="{{ $data->question }}" readonly>
                                    </div>
                                @endforeach




                                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Save Paper</button>
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
@endsection
