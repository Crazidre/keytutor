
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title> KEYTUTOR. </title>

		<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
		<link href="{{ asset('css/main.css') }}" rel="stylesheet">



		<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default bg-dark ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
           <i class="fas fa-bars"></i>
          </button>
          <a class="navbar-brand" href="/"><b> KEYTUTOR. </b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav justify-content-center">
            @guest
            <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
						<li class="nav-item"><a href="/register" class="nav-link"> Register </a></li>
            @endguest

            @auth
                <li class="nav-item"><a href="/profile" class="nav-link"> <i class="fas fa-user"></i> </a></li>
                <li class="nav-item"><a href="/posts" class="nav-link"> Posts </a></li>
                <li class="nav-item"><a href="/courses" class="nav-link"> Courses </a></li>
              <li class="nav-item"><a href="/logout" class="nav-link"> <i class="fas fa-power-off"></i> </a></li>
            @endauth

						<li class="nav-item"><a href="/about-us" class="nav-link"> About us </a></li>
						<li class="nav-item"><a href="/contact-us" class="nav-link"> Contact us </a></li>
					</ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <br>

	<div class="container" id="app">
                     
           <div class="row">

                @yield('content')

           </div>
    </div>
	
	<div class="container">
		<hr>
		<p class="centered"> <a href="https://www.crazinerd.com"> Crazinerd.com  &copy; {{ date_format(date_create(), 'Y' ) }} </a> </p>
	</div><!-- /container -->
	

    <!-- Bootstrap core JavaScript
		================================================== -->
		<script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
  </body>
</html>
