@extends('layout.master')

@section('title','Create Role')


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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Roles')}}</a></li>
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
                                        <h4 class="table-header">{{__('Create Role')}}</h4>
                                    </div>
                                    <div class="col-sm-2 text-right"> <a href="{{route('roles.index')}}" class="btn btn-primary">Back</a></div>
                                </div>

                                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="table-responsive border rounded mt-1">
                                            <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                                <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                                <span class="align-middle">Permission</span>
                                            </h6>
                                            <table class="table table-striped table-borderless">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Module</th>
                                                        <th>View</th>
                                                        <th>Create</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($menus as $key=> $menu)
                                                    <tr>
                                                        <td>{{ucfirst($menu->title)}}</td>
                                                        @foreach($menu->permissionsList as $value)
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input name="permission[]" type="checkbox" value="{{$value->id}}" class="custom-control-input" id="per_{{$value->id}}" />
                                                                <label class="custom-control-label" for="per_{{$value->id}}"></label>
                                                            </div>
                                                        </td>
                                                        @endforeach

                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-1">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </div>
                                </div>
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