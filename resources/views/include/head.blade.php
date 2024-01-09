<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

<!-- CSRF Token -->
<meta name="_token" content="{{ csrf_token() }}">

<!-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" /> -->

<!-- fonts library -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
    rel="stylesheet">

<script src="{{ asset('assets/js/app.js') }}"></script>

<link rel="stylesheet" media="all" href="{{ mix('assets/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/line-awesome-1.3.0/css/line-awesome.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<!-- Stack array for including inline css or head elements -->


@stack('plugin-styles')
