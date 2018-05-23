<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>{{Config::get('app.title')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="{{ URL::to('public/css/style.default.css') }}" />
	@yield('globalStyles')

    <link rel="shortcut icon" href="{{ URL::to('public/images/favicon.png') }}" type="image/png">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-full-width">

<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>
	<div class="leftpanel">
		<div class="logopanel">
        	<h1><span></span> {{Config::get('app.title')}} <span></span></h1>
    	</div><!-- logopanel -->
    	<div class="leftpanelinner">
			@section('nav')
				@include('admin.admin_nav')
			@show
		</div>
	</div>
	<div class="mainpanel">
		@section('admin-header')
			@include('admin.header')
		@show
		@yield('pageContainer')
	</div>

</section>

	<script type="text/javascript" src="{{ URL::asset('public/js/jquery-1.10.2.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery-migrate-1.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery-ui-1.10.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/retina.min.js') }}"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="{{ URL::asset('public/js/morris.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/raphael-2.1.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/chosen.jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/custom.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.sparkline.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.cookies.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/bootstrap-modal/js/bootstrap-modalmanager.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/bootstrap-modal/js/bootstrap-modal.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/ui-extended-modals.js') }}"></script>	
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.fileupload.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>	

	<script type="text/javascript" src="{{ URL::asset('public/js/toggles.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/additional-methods.min.js') }}"></script>	
	<script type="text/javascript" src="{{ URL::asset('public/js/app.js') }}"></script>

	@yield('pageLevelPlugins')
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	@yield('pageLevelScripts')
	<!-- END PAGE LEVEL SCRIPTS -->
	@yield('javaScript')
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>