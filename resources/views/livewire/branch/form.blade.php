<div>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Roles') }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>

    {{-- {{ dd($model->user->email) }} --}}
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
                                            <h4 class="table-header">
                                                {{ $type == 'create' ? __('Create Branch') : __('Edit Branch') }}
                                            </h4>
                                        </div>
                                        <div class="col-sm-2 text-right"> <a href="{{ route('branch.index') }}" class="btn btn-primary">Back</a></div>
                                    </div>

                                    @if ($type == 'create')
                                    {!! Form::open(['route' => 'branch.store', 'method' => 'POST']) !!}
                                    @else
                                    {!! Form::model($model, ['method' => 'PATCH', 'route' => ['branch.update', $model->id]]) !!}
                                    @endif

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Title:</strong>
                                                {!! Form::text('title', $model->title ?? null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>User:</strong>
                                                {!! Form::text('user_id', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                            </div>
                                        </div> --}}
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-primary">
                                                    <p class="mb-50">Status</p>
                                                    <input type="checkbox" name="status" class="custom-control-input" id="customSwitch10" />
                                                    <label class="custom-control-label" for="customSwitch10">
                                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                {!! Form::text('name', $branch_admin->name ?? null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Email:</strong>
                                                {!! Form::text('email', $branch_admin->email ?? null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Password:</strong>
                                                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Confirm Password:</strong>
                                                {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Role:</strong>
                                                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
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
</div>