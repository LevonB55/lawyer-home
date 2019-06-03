<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
          integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/site/main/libs/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/main/libs/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/main/libs/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/main/libs/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/main/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/main/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/main/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/main/css/dashboard_message.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/main/css/dashboard_calendar.css')}}">

</head>
<body>
<div class="dashboard_page-container">
    @include('lawyer.layouts.sidebar')
    <main class="main-content">
        @section('content')
            @yield('content')
        @show
    </main>
</div>
<script src="{{asset('assets/site/main/libs/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/site/main/libs/js/popper.min.js')}}"></script>
<script src="{{asset('assets/site/main/libs/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/site/main/libs/js/wow.min.js')}}"></script>
<script src="{{asset('assets/site/main/libs/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/site/main/js/main.js')}}"></script>
<script src="{{asset('assets/site/main/js/dashboard.js')}}"></script>

<script src="{{asset('assets/site/main/node_modules/@fullcalendar/core/main.js')}}"></script>
<script src="{{asset('assets/site/main/node_modules/@fullcalendar/daygrid/main.js')}}"></script>
</body>
</html>
