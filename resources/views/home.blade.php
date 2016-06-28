<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@if(Session::has('notice'))
		<div class="alert alert-success">
			{{ Session::get('notice') }}
		</div>
	@endif
	@if(Auth::check())
		Welcome {{ Auth::user()->name }}
		<a href="{{ url('auth/logout') }}">Desloguearse</a>
	@endif
</body>
</html>