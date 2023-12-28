@extends('layout.master')

@section('title', 'Create Visitor')

@section('content')

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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Visitor') }}</a></li>
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
                            <div class="row layout-top-spacing date-table-container card border-0">


                                <!-- Datatable go to last page -->
                                <div class=" col-xl-12 col-lg-12 col-sm-12 layout-spacing ">
                                    <div class="widget-content widget-content-area br-6 shadow p-3 mb-5 bg-white rounded ">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h4 class="table-header">{{ __('E Pass  Visitor') }}</h4>
                                            </div>
                                            <div class="col-sm-2 text-right"> <a href="{{ route('visitors.index') }}"
                                                    class="btn btn-primary">Back</a></div>
                                        </div>
                                        <form action="{{ route('epass.visitors.update') }}">
                                            <div class="row mt-2">

                                                <div class=" col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Visitor Id: </label>

                                                        <input type="text" name="visitor_id" class="form-control"
                                                            placeholder="Enter Visitor ID" id="idField" />
                                                    </div>
                                                </div>
                                                <div class=" col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Name: </label>

                                                        <input type="text" name="visitor_name" class="form-control"
                                                            placeholder="User Name" id="visitor_name" />
                                                        <input type="hidden" name="user_id" class="form-control"
                                                            placeholder="User Id" id="user_id" />

                                                    </div>
                                                </div>
                                                <div class=" col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Department: </label>

                                                        <input type="text" id="department_name"
                                                            placeholder="Department"class="form-control"
                                                            name="department_name" value="">
                                                        <input type="hidden" id="department_id" name="department_id"
                                                            value="">

                                                    </div>
                                                </div>
                                                <div class=" col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Vehicle Reg no: </label>

                                                        <input type="text" id="vechical_no" placeholder="Vehicle  Reg no"
                                                            class="form-control" name="vechical_no" value="">

                                                    </div>
                                                </div>

                                                <div class=" col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>License no: </label>

                                                        <input type="text" id="license_no" placeholder="License no"
                                                            class="form-control" name="license_no" value="">

                                                    </div>
                                                </div>
                                                <div class=" col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Passenger: </label>

                                                        <input type="text" id="passenger" placeholder="passenger"
                                                            class="form-control" name="passenger" value="">


                                                    </div>
                                                </div>
                                                <div class=" col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Source: </label>

                                                        <input type="text" id="source" placeholder="Source"
                                                            class="form-control" name="source" value="">


                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">

                                                        <label>Gate: </label>
                                                        <select class="select2-multiple  form-control" required
                                                            name="gate_id">
                                                            <option value=""> Select Gate</option>
                                                            @foreach ($gate as $value)
                                                                <option value="{{ $value->id }}">{{ $value->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-6 ">
                                                    <div class="cont">

                                                        <video id="preview" class="form-control"
                                                            style="width: 300px; height: 200px;"></video>

                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 ">

                                                    <div class="form-group">

                                                        <div class="qrinput">

                                                            <label>Qrcode:</label>
                                                            {!! Form::text('qrcode', null, ['placeholder' => 'Qrcode', 'class' => 'form-control qrcode', 'id' => 'qrcode']) !!}
                                                        </div>
                                                    </div>



                                                </div>

                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">verify</button>
                                            </div>
                                        </form>


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
    <style type="text/css">
        .qrcode {
            font-size: 16px;
            font-weight: bold;
            padding: 4px;
        }

        .select2-container .select2-selection--single {
            height: 40px;
            border: 1px solid #dcdcdc;
            border-radius: 7px;
        }
    </style>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $('body').on('change', '#idField', function() {
                var id = $(this).val();
                let url = "{{ url('app/visitor-managment/visitor/info') }}" + '/' + id;
                $.get(url, function(data) {
                    //console.log(data?.data);
                    // console.info(JSON.stringify(data));
                    if (data.success === true) {
                        Object.keys(data.data).forEach(function(key) {
                            // console.log('Key : ' + key + ', Value : ' + data.data[key])
                            $("#" + key).val(data.data[key]);
                        })
                    } else {
                        Swal.fire('No record found  ')

                    }

                })
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('instascan/instascan.min.js') }}"></script>
    <script>
        document.querySelector("input[type=number]")
            .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
    </script>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            document.getElementById('qrcode').value = content;
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                // console.log( cameras);
                scanner.start(cameras[0]).then(function() {
                    console.log('here');
                }).catch(function(e) {});
            } else {}
        }).catch(function(e) {});

        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });
    </script>



@endsection
