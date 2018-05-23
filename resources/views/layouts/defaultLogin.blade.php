<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{Config::get('app.title')}}</title>
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

  <link href="{{ URL::to('public/css/style.default.css') }}" rel="stylesheet">

  <!-- Fonts -->
  <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    body.bg {
      background: url("public/images/index_bg.jpg") repeat scroll 0 0 / cover rgba(0, 0, 0, 0);
      height: 100%;
      overflow: visible;
      width: 100%;      
    }
  </style>
</head>
<body id="mainbody" class="signin bg">
  <!-- Preloader -->
  <div id="preloader">
      <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
  </div>

  <section>
    <!-- BEGIN LOGIN -->
    <div class="content1">
    @yield('content')
    </div>
    <!-- END LOGIN -->
   
  </section>

  <!-- BEGIN CORE PLUGINS -->
  <script src="{{ URL::asset('public/js/jquery-1.10.2.min.js') }}"></script>
  <script src="{{ URL::asset('public/js/jquery-migrate-1.2.1.min.js') }}"></script>
  <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('public/js/modernizr.min.js') }}"></script>
  <script src="{{ URL::asset('public/js/retina.min.js') }}"></script>
  <script src="{{ URL::asset('public/js/custom.js') }}"></script>
  <script src="{{ URL::asset('public/js/jquery.sparkline.min.js') }}"></script>

  <script src="{{ URL::asset('public/js/jquery.cookies.js') }}"></script>
  <script src="{{ URL::asset('public/js/toggles.min.js') }}"></script>
  <script src="{{ URL::asset('public/js/chosen.jquery.min.js') }}"></script>

  <script src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
  <script src="{{ URL::asset('public/js/additional-methods.min.js') }}"></script>
  <script src="{{ URL::asset('public/js/app.js') }}"></script>

  <!-- END CORE PLUGINS -->

  <!-- BEGIN JAVASCRIPTS -->
  @yield('javaScript')
  <!-- END JAVASCRIPTS -->
</body>
</html>
