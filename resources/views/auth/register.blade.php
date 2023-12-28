@extends('layout.master-auth')


@section('title', 'Register')
@push('plugin-styles')
    <style>
        .main_div_for_register {
            padding: 30px 0;
            width: 80%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .transparent_div {
            width: 70%;
            padding: 30px 20px;
            background: rgba(255, 255, 255, 0.37);
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            backdrop-filter: blur(1.9px);
            -webkit-backdrop-filter: blur(1.9px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        #my_camera,
        #my_camera1,
        #my_camera2 {
            width: 100% !important;
            margin-bottom: 20px;
            text-align: center;
        }

        #my_camera video,
        #my_camera1 video,
        #my_camera2 video {
            border-radius: 10px;
            border: 1px solid #eee;
            padding: 5px;
            width: 100% !important;
            min-height: 150px !important;
        }

        #results,
        #results1,
        #results2 {
            padding: 10px;
            border: 1px solid #eee;
            margin-top: 10px;
            border-radius: 10px;
            min-height: 150px;
        }

        #results img,
        #results2 img,
        #results1 img {
            width: 100%;
            height: 150px;

        }
    </style>
@endpush

@section('content')



    <div class="main_div_for_register">
        <div class="transparent_div">

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3 mx-auto my-3">
                        <img src="{{ asset('assets/img/cardimg.png') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <strong>Full name</strong>

                                <input id="name" type="text" placeholder="name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <strong>Cnic #</strong>

                                <input id="cnic" type="text"
                                    class="form-control @error('cnic') is-invalid @enderror" placeholder="cnic"
                                    name="cnic" required autocomplete="new-cnic">

                                @error('cnic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Mobile</strong>

                                <input id="mobile" type="text"
                                    class="form-control @error('mobile') is-invalid @enderror" placeholder="phone"
                                    name="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <strong>Password</strong>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="password"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-5">
                            <div class="col-md-12">
                                <strong> Confirm Password</strong>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Confirm Password" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                    </div>


                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div id="my_camera"></div>
                        <input type=button class="btn btn-block" value="Profile" onClick="take_snapshot()">
                        <input type="file" name="profile" class="form-control mt-2">
                        <div id="results"></div>
                        <input type="hidden" name="profile" id="profile">
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div id="my_camera1"></div>
                        <input type="button" class="btn btn-block" value="Cnic Front" onClick="take_snapshot1()">
                        <input type="file" name="cnic_front" class="form-control mt-2">
                        <div id="results1">
                        </div>
                        <input type="hidden" name="cnic_front" id="cnic_front">
                    </div>

                    <div class="col-xs-6 coll-sm-6 col-md-4">

                        <div id="my_camera2"></div>
                        <input type="button" class="btn btn-block" value="Cnic Back" onClick="take_snapshot2()">
                        <input type="file" name="cnic_back" class="form-control mt-2">
                        <div id="results2">
                        </div>
                        <input type="hidden" name="cnic_back" id="cnic_back">
                    </div>
                </div>






                <div class="row">
                    <div class="col-md-4 mx-auto my-5">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script type="text/javascript" src="{{ asset('webcamjs/webcam.min.js') }}"></script>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 150,
            height: 150,
            image_format: 'jpg',
            jpeg_quality: 100
        });
        Webcam.attach('#my_camera');
        Webcam.attach('#my_camera1');
        Webcam.attach('#my_camera2');
    </script>
    <!-- A button for taking snaps -->

    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">
        function take_snapshot() {

            // take snapshot and get image data
            Webcam.snap(function(data_uri) {
                // display results in page
                document.getElementById('results').innerHTML =
                    '<img src="' + data_uri + '" />';

                $('#profile').val(data_uri);


            });
        }

        function take_snapshot1() {

            // take snapshot and get image data
            Webcam.snap(function(data_uri) {
                // display results in page
                document.getElementById('results1').innerHTML =
                    '<img src="' + data_uri + '"  />';
                $('#cnic_front').val(data_uri);


            });
        }

        function take_snapshot2() {

            // take snapshot and get image data
            Webcam.snap(function(data_uri) {
                // display results in page
                document.getElementById('results2').innerHTML =
                    '<img src="' + data_uri + '" name="cnic_back"/>';

                $('#cnic_back').val(data_uri);

            });
        }
    </script>
@endpush
