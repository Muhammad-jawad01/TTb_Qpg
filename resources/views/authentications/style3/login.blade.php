@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/authentication/auth_3.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-three">
        <div class="container-fluid login-three-container">
            <div class="container">
                <div class="row main-login-three">

                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="d-flex flex-column justify-content-between h-100 right-area">
                            <div>
                                <div>
                                    <h4 class="d-flex justify-content-center"><strong>{{ __('Login') }}</strong></h4>
                                </div>
                                <div class="login-three-inputs mt-5">
                                    <input type="text" placeholder="{{ __('Username') }}">
                                    <i class="las la-user-alt"></i>
                                </div>
                                <div class="login-three-inputs mt-3">
                                    <input type="password" placeholder="{{ __('Password') }}">
                                    <i class="las la-lock"></i>
                                </div>
                                <div class="login-three-inputs check mt-4">
                                    <input class="inp-cbx" id="cbx" type="checkbox" style="display: none">
                                    <label class="cbx" for="cbx">
                                        <span>
                                            <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                        <span class="font-13 text-muted">{{ __('Remember me ?') }}</span>
                                    </label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <a class="text-white btn bg-gradient-primary" href="{{ url('/') }}">
                                        {{ __('Login') }} <i class="las la-key ml-2"></i></a>
                                    <a class="font-13 text-primary"
                                        href="{{ url('/authentications/style3/forgot-password') }}">{{ __('Forgot your Password ?') }}</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-end">
                                <!-- <img src="" height="50%" alt=""> -->
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-xl-6 col-lg-6 col-md-6"style="background-color:#558bf8 0%, #558bf8 !important ;height: 100vh">

                        <img src="{{ asset('assets/img/login.png') }}" class="mt-3" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/libs/jquery-3.6.0.min.js') !!}
    {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/authentication/auth_2.js') !!}
@endpush

@push('custom-scripts')
@endpush
