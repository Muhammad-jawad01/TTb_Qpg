<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title> @yield('title', '') | QPG </title>
    <link rel="shortcut icon" href="{{asset('logo-1.ico')}}" type="image/x-icon">
    <!-- initiate head with meta tags, css and script -->
    @include('include.head')
    @livewireStyles

    {!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
    <style>
        .sub-header-container .navbar .toggle-sidebar,
        .sub-header-container .navbar .sidebarCollapse {
            position: relative;
            padding: 0 25px 0 16px;
            display: none !important;
        }

        #content {
            margin-top: 0 !important;
        }
    </style>
</head>

<body class="{{ $theme . 'mode' }}" data-base-url="{{ url('/') }}">
    <!-- Loader Starts -->
    @include('include.loader')
    <!--  Loader Ends -->

    <!--  Navbar Starts  -->

    <!--  Navbar Ends  -->

    <!--  Main Container Starts  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <div class="rightbar-overlay"></div>

        <!--  Sidebar Starts  -->
        <div class="sidebar-wrapper sidebar-theme">
            <div>
                <div class="sc-container">
                </div>
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                    <i class="las la-angle-left"></i>
                </a>
            </div>
            @include('include.sidebar')
        </div>
        <!--  Sidebar Ends  -->

        <!--  Content Area Starts  -->
        <div id="content" class="main-content">

            <div class="header-container">
                @include('include.header')
            </div>
            <!-- Main Body Starts -->
            @yield('content')
            <!-- Main Body Ends -->

            @include('include.responsive-message')

            <!-- Copyright Footer Starts -->
            @include('include.footer')
            <!-- Copyright Footer Ends -->

            <!-- Arrow Starts -->
            <div class="scroll-top-arrow" style="display: none;">
                <i class="las la-angle-up"></i>
            </div>
            <!-- Arrow Ends -->
        </div>
        <!--  Content Area Ends  -->

        <!--  Rightbar Area Starts -->
        @include('include.rightbar')
        <!--  Rightbar Area Ends -->
    </div>
    <!-- Main Container Ends -->

    <!-- Common Script Starts -->
    @include('include.scripts')
    @livewireScripts

    @yield('script')

    <!-- Common Script Ends -->
    <!-- Sweet Alert  -->
    @include('sweetalert::alert')
    {!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
    {!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
    <script>
        function distory(url) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            Swal.fire({
                title: "Are you sure ?",
                text: "Deleted Data Cannot Be Recovered!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Delete!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "delete",
                        success: function(data) {
                            $('#last-page-dt').DataTable().ajax.reload();
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>
