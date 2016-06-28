@extends('template')
	 @section('content')
	 <div class="container">
	 	<div class="row">
		 	<div class="col-md-6 col-md-offset-3">
		 		<form 
						action="{{ url('suscription/plan') }}"
					method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<label for="">Basico</label>
					</div>
					<input type="submit" value="
					@if(Auth::user()->tendaz_plan == 'basic')
						Pagar Plan
					@elseif(Auth::user()->tendaz_plan == 'premiun')
					Bajar plan
					@endif
					" class="btn btn-primary 
					@if(Auth::user()->tendaz_plan == 'basic')
						active
					@endif
					)
					">
					<input type="hidden" name="plan" value="basic">
				</form>
		 	</div>
	 	</div>
	 	<div class="row">
		 	<div class="col-md-6 col-md-offset-3">
		 		<form action="{{ url('suscription/plan') }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<label for="">Premium</label>
					</div>
					<input type="submit" value="
						@if(Auth::user()->tendaz_plan == 'premiun')
						Pagar Plan
					@elseif(Auth::user()->tendaz_plan == 'basic')
					Subir  plan
					@endif
					" class="btn btn-primary 	
					@if(Auth::user()->tendaz_plan == 'premiun')
						active
					@endif">
					<input type="hidden" name="plan" value="premiun">
				</form>
		 	</div>
	 	</div>
	 </div>
		
	 @endsection
	  @section('scripts')
		<script src="https://js.stripe.com/v2/"></script>
		<script>
			
		</script>
	 @endsection