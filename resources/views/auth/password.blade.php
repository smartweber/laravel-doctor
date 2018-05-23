<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Kode - Premium Bootstrap Admin Template</title>

  <!-- ========== Css Files ========== -->
  <link rel="stylesheet" href="{{ URL::to('assets/css/root.css') }}" />
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>			

<div class="login-form">
     @if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
     <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="top">
          <h1>Forgot Password</h1>
          <h4>You can reset your password</h4>
        </div>
        <div class="form-area">
             <div class="group">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" />
            <i class="fa fa-envelope-o"></i>
          </div>
          <button type="submit" class="btn btn-default btn-block">SEND RESET LINK</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-12"><a href="{{ url('/auth/login') }}"><i class="fa fa-sign-in"></i> Login</a></div>
        <!--<div class="col-xs-6 text-right"><a href="#"><i class="fa fa-external-link"></i> Register Now</a></div>-->
      </div>
    </div>



  @yield('javaScript')
</body>
</html>