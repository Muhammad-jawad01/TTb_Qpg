@extends('layout.master')
@section('title', 'Dashboard')
@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_1.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
@endpush

@section('content')
    <div class="layout-px-spacing">
        <div class="row">
            <div class="col-md-6">
                {{-- wig --}}
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                        <a class="widget quick-category">
                            <div class="quick-category-head">
                                <span class="quick-category-icon qc-primary rounded-circle">
                                    <i class="las la-chalkboard-teacher"></i> </span>
                                <div class="ml-auto">

                                </div>
                            </div>
                            <div class="quick-category-content">
                                <h3> {{ $classes }}</h3>
                                <p class="font-17 text-primary mb-0"> Total Classes </p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                        <a class="widget quick-category">
                            <div class="quick-category-head">
                                <span class="quick-category-icon qc-warning rounded-circle">
                                    <i class="las la-book"></i>
                                </span>
                                <div class="ml-auto">

                                </div>
                            </div>
                            <div class="quick-category-content">
                                <h3> {{ $subject }}</h3>
                                <p class="font-17 text-warning mb-0"> Subjects</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                        <a class="widget quick-category">
                            <div class="quick-category-head">
                                <span class="quick-category-icon qc-secondary rounded-circle">
                                    <i class="las la-brain"></i></span>

                                <div class="ml-auto">

                                </div>
                            </div>
                            <div class="quick-category-content">
                                <h3> {{ $mcq }}</h3>
                                <p class="font-17 text-secondary mb-0"> MCQ Question</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                        <a class="widget quick-category">
                            <div class="quick-category-head">
                                <span class="quick-category-icon qc-success-teal rounded-circle">
                                    <i class="las la-pencil-ruler"></i> </span>
                                <div class="ml-auto">

                                </div>
                            </div>
                            <div class="quick-category-content">
                                <h3> {{ $short }}</h3>
                                <p class="font-17 text-success-teal mb-0"> Short Question</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                        <a class="widget quick-category">
                            <div class="quick-category-head">
                                <span class="quick-category-icon qc-success-teal rounded-circle">
                                    <i class="las la-file-signature"></i> </span>
                                <div class="ml-auto">

                                </div>
                            </div>
                            <div class="quick-category-content">
                                <h3> {{ $long }}</h3>
                                <p class="font-17 text-success-teal mb-0"> Long Question</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                        <a class="widget quick-category">
                            <div class="quick-category-head">
                                <span class="quick-category-icon qc-primary rounded-circle">
                                    <i class="las la-copy"></i> </span>
                                <div class="ml-auto">

                                </div>
                            </div>
                            <div class="quick-category-content">
                                <h3> {{ $paper }}</h3>
                                <p class="font-17 text-primary mb-0"> Total Paper </p>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
            <div class="col-md-6">


                <div class="widget quick-category">

                    {{-- chart --}}
                    <div class="container " id="chart">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                        <a class="widget quick-category">
                            <div class="quick-category-head">
                                <span class="quick-category-icon qc-success-teal rounded-circle">
                                    <i class="las la-user"></i> </span>
                                <div class="ml-auto">

                                </div>
                            </div>
                            <div class="quick-category-content">
                                <h3> {{ $user }}</h3>
                                <p class="font-17 text-success-teal mb-0"> User</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">

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
    {!! Html::script('assets/js/dashboard/dashboard_1.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    {!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
    {!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
    {!! Html::script('plugins/fullcalendar/moment.min.js') !!}
@endpush


@push('custom-scripts')
    <script>
        let series = "{{ json_encode($chartData) }}";
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'pie',
                    height: "330px"
                },
                series: JSON.parse(series), // Replace with your data
                labels: ['Total Classes', 'Subjects', 'MCQ Questions', 'Short Questions', 'Long Questions',
                    'Total Papers'

                ],
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();

            var options = {
                chart: {
                    type: 'bar', // Change chart type to 'bar'
                    height: "330px"
                },
                plotOptions: {
                    bar: {
                        horizontal: false // Set to true if you want horizontal bars
                    }
                },
                xaxis: {
                    categories: ['Total Classes', 'Subjects', 'MCQ Questions', 'Short Questions',
                        'Long Questions', 'Total Papers'
                    ]
                },
                series: JSON.parse(series),
                labels: ['Total Classes', 'Subjects', 'MCQ Questions', 'Short Questions', 'Long Questions',
                    'Total Papers'
                ],
            };

            var chart = new ApexCharts(document.querySelector("#bar"), options);
            chart.render();
        });
    </script>
@endpush
