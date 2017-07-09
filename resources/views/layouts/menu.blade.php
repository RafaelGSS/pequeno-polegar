<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pequeno Polegar | @yield('title')</title>
    	<!-- Tst -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/content.css')}} ">
		<link href="{{ asset('css/main.css') }}" rel="stylesheet">

 		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
    	<script src="{{ asset('js/main.js') }}"></script>
	</head>
	<body>
		<div class="header">
			<div class="logo">
				<i class="fa fa-graduation-cap"></i>
				<span>Pequeno Polegar</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-graduation-cap"></i>
				<span>Pequeno Polegar</span>
			</div>
			<div class="user">
				<span>{{ucwords(Auth::user()->name)}}</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="{{route('alunos.index')}}">
							<span><i class="fa fa-user"></i></span>
							<span>Alunos</span>
						</a>
					</li>
					<li>
						<a href="#">

							<span><i class="fa fa-envelope"></i></span>
							<span>Funcionarios</span>
						</a>
					</li>
					<li class="active">
						<a href="{{url('/config')}}">
							<span><i class="fa fa-cog"></i></span>
							<span>Configuração</span>
						</a>
					</li>
					<li>
						<form id="logout-form" action="{{ route('logout') }}" method="post">
							{{ csrf_field() }}
						<a href="#" onclick="document.getElementById('logout-form').submit()">
							<span><i class="fa fa-user-circle"></i></span>
							<span>Logout</span>
						</a>
					</form>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
			@yield('titleMain')
			</div>
			<div class="main">
				@yield('main')
			</div>
			 @yield('mainPerso')
		</div>
	</body>
</html>
