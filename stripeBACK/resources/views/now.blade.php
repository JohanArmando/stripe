@extends('template')
	@section('content')
		<center><h1 class="text-warning">{{ Auth::user()->name }} </h1></center>
		<center>
			<h1 class="text-success">
				@if(Auth::user()->subscribed())
					Plan: {{ Auth::user()->tendaz_plan }}
					<a href="{{ url('suscription/plan') }} " class="btn btn-default">Cambiar de plan</a>
					<a href="{{ url('suscription/pay-plan') }} " class="btn btn-success">Pagar plan</a>
				@endif
			</h1>
		</center>
			<center>
			<h1 class="text-success">
				@if(!Auth::user()->subscribed() && Auth::user()->free == 0)
					<a href="{{ url('suscription/plan') }}" class="btn btn-default">Comprar plan</a>
				@endif
			</h1>
		</center>
		<center>
			<h4 class="text-success">
				@if(Auth::user()->free == 1)
					El usuario se encuentra en prueba gratis 
					<br> Te quedan :  {{ \Carbon\Carbon::now()->diffForHumans(\Carbon\Carbon::parse(Auth::user()->finish_free)) }}
					<br>
					<br>
					<a href="{{ url('suscription/plan') }}" class="btn btn-default">Comprar plan</a>
				@endif
			</h4>
		</center>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<center><a href="{{ url('suscription/home')}}" class="btn btn-block btn-lg btn-danger ">Ir a casa</a></center>
			</div>
		</div>
	
	@endsection