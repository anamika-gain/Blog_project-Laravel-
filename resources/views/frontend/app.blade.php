<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset ('/') }}/front-end/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset ('/') }}/front-end/css/animate.css">
    <link rel="stylesheet" href="{{ asset ('/') }}/front-end/css/owl.carousel.min.css">

    <link rel="stylesheet" href="{{ asset ('/') }}/front-end/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset ('/') }}/front-end/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset ('/') }}/front-end/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset ('/') }}/front-end/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>


<div class="wrap">

 @include('frontend.header')
    <!-- END header -->

 @yield('content')

 @include('frontend.footer')
    <!-- END footer -->

</div>

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

<script src="{{ asset ('/') }}/front-end/js/jquery-3.2.1.min.js"></script>
<script src="{{ asset ('/') }}/front-end/js/jquery-migrate-3.0.0.js"></script>
<script src="{{ asset ('/') }}/front-end/js/popper.min.js"></script>
<script src="{{ asset ('/') }}/front-end/js/bootstrap.min.js"></script>
<script src="{{ asset ('/') }}/front-end/js/owl.carousel.min.js"></script>
<script src="{{ asset ('/') }}/front-end/js/jquery.waypoints.min.js"></script>
<script src="{{ asset ('/') }}/front-end/js/jquery.stellar.min.js"></script>


<script src="{{ asset ('/') }}/front-end/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>
</body>
</html>

