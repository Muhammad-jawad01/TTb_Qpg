@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_2.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Dashboards')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Dashboard 2')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-center ml-auto right-side-filter">
                <li class="nav-item more-dropdown">
                    <div class="input-group input-group-sm">
                        <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                        <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary" id="basic-addon2">
                                        <i class="lar la-calendar"></i>
                                    </span>
                        </div>
                    </div>
                </li>
                <li class="nav-item more-dropdown">
                    <a href="javascript: void(0);" data-original-title="{{__('Reload Data')}}" data-placement="bottom" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-sync"></i>
                    </a>
                </li>
                <li class="nav-item custom-dropdown-icon">
                    <a href="javascript: void(0);" data-original-title="{{__('Filter')}}" data-placement="bottom" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-filter"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                        <a class="dropdown-item" data-value="Filter 1" href="javascript:void(0);">{{__('Filter 1')}}</a>
                        <a class="dropdown-item" data-value="Filter 2" href="javascript:void(0);">{{__('Filter 2')}}</a>
                        <a class="dropdown-item" data-value="Filter 3" href="javascript:void(0);">{{__('Filter 3')}}</a>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget top-welcome">
                    <div class="f-100">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="{{asset('assets/img/profile-1.jpg')}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                    </div>
                                    <div class="align-self-center media-body">
                                        <div class="text-muted">
                                            <p class="mb-2 text-primary"> {{ __('Welcome to dashboard') }}</p>
                                            <h5 class="mb-1"> {{ __('John Doe') }}</h5>
                                            <p class="mb-0"> {{ __('System Admin') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-self-center col-lg-5">
                                <div class="text-lg-center mt-4 mt-lg-0">
                                    <div class="row">
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2"> {{ __('Projects') }}</p>
                                                <h5 class="mb-0"> {{ __('48') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2"> {{ __('Team') }}</p>
                                                <h5 class="mb-0"> {{ __('40') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2"> {{ __('Clients') }}</p>
                                                <h5 class="mb-0"> {{ __('18') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2"> {{ __('Sellers') }}</p>
                                                <h5 class="mb-0"> {{ __('98') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-lg-flex col-lg-3 align-items-end justify-content-center flex-column">
                                <button class="btn btn-primary">
                                    {{ __('Settings') }}
                                </button>
                                <button class="btn btn-info mt-2">
                                    {{ __('My Chat') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 COLUMNS -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget bg-gradient-danger">
                    <div class="f-100">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="text-white">
                                    <h5 class="text-white"> {{ __('Pending Tasks !') }}</h5>
                                    <p class="blink_me text-white mt-1"> {{ __('Deadline Tomorrow') }}</p>
                                    <ul class="pl-3 mb-0">
                                        <li class="py-1"> {{ __('Seller Payments') }}</li>
                                        <li class="py-1"> {{ __('Check Payouts') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="align-self-end col-md-5">
                                <img src="assets/img/dashboard-image-uw.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                            <span class="quick-category-icon qc-primary rounded-circle">
                                                <i class="las la-shopping-cart"></i>
                                            </span>
                                </div>
                                <h5 class="font-size-14 mb-0"> {{ __('Orders') }}</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2"> {{ __('1,452') }}
                                    <i class="las la-angle-up text-success-teal"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> {{ __('+ 0.2%') }} </span>
                                    <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                            <span class="quick-category-icon qc-primary rounded-circle">
                                                <i class="las la-hand-holding-usd"></i>
                                            </span>
                                </div>
                                <h5 class="font-size-14 mb-0"> {{ __('Profit') }}</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2"> {{ __('$200') }}
                                    <i class="las la-angle-down text-danger"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-danger font-size-12"> {{ __('- 5.4%') }} </span>
                                    <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                            <span class="quick-category-icon qc-primary rounded-circle">
                                                <i class="las la-user"></i>
                                            </span>
                                </div>
                                <h5 class="font-size-14 mb-0"> {{ __('Customer') }}</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2"> {{ __('9,887') }}
                                    <i class="las la-angle-up text-success-teal"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> {{ __('+ 25%') }} </span>
                                    <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 COLUMNS END-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing ">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Weather Report') }}</h5>
                        <h6 class="pt-1"> {{ __('Sydney, Australia') }}</h6>
                    </div>
                    <div class="widget-content">
                        <div class="monthly-weather-report">
                            <div class="d-sm-flex d-block justify-content-between mb-4">
                            </div>
                            <div class="row weather-report-container justify-content-between">
                                <div class="col-xl-4 col-md-5">
                                    <div class="tempareture-box-2 d-flex justify-content-sm-center justify-content-between mb-4 mb-sm-0">
                                        <div class="tempareture-box-icon">
                                            <i class="las la-sun slow-spin text-warning font-135"></i>
                                        </div>
                                        <div class="tempareture-box-content text-center ml-4">
                                            <div class="temp-top">
                                                <span class="font-65 text-warning">18°C</span>
                                            </div>
                                            <div class="temp-bottom">
                                                <a> {{ __('Yesterday - ') }}<span class="temp-1 strong text-primary">24°C</span></a>
                                                <a> {{ __('Tomorrow -') }} <span class="temp-2 strong text-primary">22°C</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row monthly-weather-report-inner">
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-warning font-45">
                                                            <i class="las la-sun"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Warm') }}</h5>
                                                    <p> {{ __('Clear') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-black font-45">
                                                            <i class="las la-moon"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Night') }}</h5>
                                                    <p> {{ __('Pleasant') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-info font-45">
                                                            <i class="las la-cloud-rain"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Cloudy') }}</h5>
                                                    <p> {{ __('Raining') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-info font-45">
                                                            <i class="las la-tint"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('58%') }}</h5>
                                                    <p> {{ __('Humidity') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-dpink font-45">
                                                            <i class="las la-wind"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('17 mph') }}</h5>
                                                    <p> {{ __('Wind Speed') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-info font-45">
                                                            <i class="las la-cloud-moon-rain"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('29.57 ml') }}</h5>
                                                    <p> {{ __('Rainfall') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-primary text-white mt-3">
                            <div class="mb-0">
                                <div class="">
                                    <div class="whole-week-days d-flex flex-wrap justify-content-sm-around p-3">
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Mon') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('58°F') }}</h6>
                                                    <p class="mb-0 text-white"> {{ __('28°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Tue') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-sun font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('60°F') }}</h6>
                                                    <p class="mb-0 text-white"> {{ __('29°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Wed') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0">{{ __('60°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('30°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Thu') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-sun font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('40°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('19°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Fri') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-sun-rain font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('46°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('23°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Sat') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0">{{ __('48°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('28°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Top Seller Performance') }}</h5>
                        <ul class="tabs tab-pills">
                            <li>
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{ __('Options') }}</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{ __('Quarterly') }}</a>
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{ __('Half Yearly') }}</a>
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{ __('Mail') }}</a>
                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{ __('Print') }}</a>
                                        <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{ __('Download') }}</a>
                                        <a class="dropdown-item" data-value="Share" href="javascript:void(0);"> {{ __('Share') }}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content">
                        <div class="tabs tab-content row">
                            <div class="left-area col-lg-4">
                                <h6 class="mb-0 mt-4"> {{ __('WS Retail') }}</h6>
                                <p> {{ __('Best Seller of the month') }}</p>
                                <h4 class="mt-3"> {{ __('$3,808') }}</h4>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> {{ __('+ 25%') }} </span>
                                    <span class="ml-2 text-truncate"> {{ __('more sales') }}</span>
                                </div>
                                <button class="btn btn-sm btn-primary mt-4"> {{ __('View Details') }}</button>
                                <p class="mb-0 mt-4"> {{ __('Last Month') }}</p>
                                <p> {{ __('$2,405') }}</p>
                            </div>
                            <div class="right-area col-lg-8">
                                <div id="content_1" class="tabcontent">
                                    <div id="bestSeller"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading">
                        <h5 class="text-center"> {{ __('Top Selling Product') }}</h5>
                    </div>
                    <div class="widget-content mt-4">
                        <img src="{{asset('assets/img/product-1.jpg')}}" class="rounded-circle avatar-md img-thumbnail m-auto object-cover"/>
                        <h6 class="text-center mt-2"> {{ __('Product One') }}</h6>
                        <p class="text-center"> {{ __('$5,458') }}</p>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="badge badge-success font-size-12"> {{ __('+ 25%') }} </span>
                            <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                        </div>
                        <img src="{{asset('assets/img/product-4.jpg')}}" class="rounded-circle avatar-md img-thumbnail m-auto object-cover"/>
                        <h6 class="text-center mt-2"> {{ __('Product Two') }}</h6>
                        <p class="text-center"> {{ __('$5,458') }}</p>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="badge badge-danger font-size-12"> {{ __('- 25%') }} </span>
                            <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-6 layout-spacing">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class=""> {{ __('Sales details of product') }}</h5>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex justify-content-between">
                                    <p class="font-35 text-success-teal"> {{ __('$74,989') }}</p>
                                    <i class="lar la-chart-bar font-45 text-success-teal"></i>
                                </div>
                                <p> {{ __('Total 175 Sales') }}</p>
                                <a class="btn btn-sm btn-primary"> {{ __('View Details') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 layout-spacing">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class=""> {{ __('Pending payment of product') }}</h5>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex justify-content-between">
                                    <p class="font-35 text-warning"> {{ __('$24,989') }}</p>
                                    <i class="lar la-chart-bar font-45 text-warning"></i>
                                </div>
                                <p> {{ __('Total 98 clients') }}</p>
                                <a class="btn btn-sm btn-warning"> {{ __('View Details') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class=""> {{ __('Recent Items') }}</h5>
                                <ul class="tabs tab-pills">
                                    <li>
                                        <div class="dropdown  custom-dropdown-icon">
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{ __('Options') }}</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{ __('Print') }}</a>
                                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{ __('Download') }}</a>
                                                <a class="dropdown-item" data-value="Share" href="javascript:void(0);"> {{ __('Share') }}</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex flex-column">
                                    <div class="media recent-items w-100 align-items-center mt-2 mb-4">
                                        <img src="{{asset('assets/img/product-1.jpg')}}" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1"> {{__('1005 Farland Street,West Roxbury')}}</h5>
                                            <p> {{__('05 Jul 2018, Fergus Douchebag')}}</p>
                                        </div>
                                        <a class="badge badge-success-teal text-white mr-2"> {{ __('Completed') }}</a>
                                        <a class="badge badge-warning text-white d-none d-md-block"> {{ __('Pending') }}</a>
                                    </div>
                                    <div class="media recent-items w-100 align-items-center mb-4">
                                        <img src="{{asset('assets/img/product-2.jpg')}}" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1"> {{__('845 Nrarland Street,east Opobury')}} </h5>
                                            <p> {{__('12 Jul 2019, Fergus Douchebag')}}</p>
                                        </div>
                                        <a class="badge badge-info text-white mr-2"> {{ __('Processing') }}</a>
                                        <a class="badge badge-success text-white d-none d-md-block"> {{ __('Done') }}</a>
                                    </div>
                                    <div class="media recent-items w-100 align-items-center mb-4">
                                        <img src="{{asset('assets/img/product-3.jpg')}}" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1"> {{__('8/D Talbagan Street,North 24 midland Opobury')}}</h5>
                                            <p> {{__('12 Jul 2019, Jonas Ferguson')}}</p>
                                        </div>
                                        <a class="badge badge-danger text-white mr-2"> {{ __('Failed') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-content">
                        <div class="agent-info text-center">
                            <div class="agent-img pb-3">
                                <img src="{{asset('assets/img/profile-5.jpg')}}" class="img-thumbnail rounded-circle" alt="image">
                            </div>
                            <h5 class="text-dark"> {{__('Hermann P. Schnitzel')}}</h5>
                            <p> {{ __('Agent of Property') }}</p>
                            <h6 class="mb-3 mt-3"><span class="text-primary pr-2"><i class="fa fa-phone"></i></span> {{ __('(+1) 774-238-0096') }}</h6>
                        </div>
                        <form action="index.html" class="agent-req-form mt-2">
                            <h6 class="text-muted text-center mb-4"> {{ __('Request Inquiry') }}</h6>
                            <div class="form-group">
                                <input type="text" placeholder=" {{ __('Full Name *') }}" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder=" {{ __('Email ID *') }}" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder=" {{ __('Phone No *') }}" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <textarea rows="3" placeholder=" {{ __('Message *') }}" class="form-control bg-white text-muted"></textarea>
                            </div>
                            <div class="form-group text-right mb-0">
                                <button type="submit" class="btn btn-sm btn-outline-primary"> {{ __('Submit Request') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-chart-one">
                    <div class="widget-content overflow-hidden">
                        <div class="ticker-wrap">
                            <div class="ticker-heading bg-gradient-info">
                                <p> {{ __('Overview') }}</p>
                            </div>
                            <div class="ticker">
                                <div class="ticker-item"> {{ __('Letterpress chambray brunch.') }}</div>
                                <div class="ticker-item"> {{ __('Vice mlkshk crucifix beard chillwave meditation hoodie asymmetrical Helvetica.') }}</div>
                                <div class="ticker-item"> {{ __('Ugh PBR&B kale chips Echo Park.') }}</div>
                                <div class="ticker-item"> {{ __('Gluten-free mumblecore chambray mixtape food truck.') }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_2.js') !!}
@endpush

@push('custom-scripts')

@endpush
