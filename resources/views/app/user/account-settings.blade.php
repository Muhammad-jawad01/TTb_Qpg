@extends('layout.master')

{{-- @section('title', 'Change Password') --}}


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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('User') }}</a></li>
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
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <h4 class="table-header">{{ __('Account Setting ') }}</h4>
                                        </div>
                                        <div class="col-sm-2 text-right"> <a href="{{ URL::previous() }}"
                                                class="btn btn-primary">Back</a></div>
                                    </div>

                                    {{-- {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update_setting', $user->id]]) !!} --}}
                                    <form action="{{ route('users.update_setting') }}" method="POST">
                                        @csrf
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    <input type="name" name="name" class='form-control'
                                                        value="{{ $user->name }}">

                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <strong>Email:</strong>
                                                    <input type="email" name="email" class='form-control'
                                                        value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <strong>Password:</strong>

                                                    <input type="password" name="password" class='form-control'
                                                        placeholder='Password'>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <strong>Confirm Password:</strong>
                                                    <input type="password" name="password" class='form-control'
                                                        placeholder='Confirm Password'>

                                                    {{-- {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!} --}}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                        {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection
