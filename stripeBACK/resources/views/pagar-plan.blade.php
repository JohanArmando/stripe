@extends('template')
	 @section('content')
	 @if(!isset($plan))
		<script>
			window.location.href = "{{ url('/') }}"
		</script>
	 @endif
	 @if(Session::has('notice'))
		<div class="alert alert-success">
			{{ Session::get('notice') }}
		</div>
	@endif
	 <h1>Vas a pagar el plan : {{ $plan }} </h1>
	 <small>escoger otro plan <a href="">aqui</a></small>
	 <div class="container">
	 	<div class="row">
		 	<div class="col-md-6 col-md-offset-3">
		 		<form  id="subscription-form" method="POST" action="{{  url('suscription/pay-plan') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				 	 <div class="stripe-errors  alert alert-danger">
               
                    </div>
					<label for="">Escoge el tiempo</label>
					@if($plan == 'basic')
					<select name="plan" id="" class="form-control">
						<option value="plan mensual tendaz">Un mes 10 dolares</option>
						<option value="trimestral">Tres meses 28 dolares</option>
						<option value="anual">Un año 98 dolares</option>
					</select>
					@elseif($plan == 'premiun')
					<select name="plan" id="" class="form-control">
						<option value="mensual20">Un mes 10 dolares</option>
						<option value="trimestral20">Tres meses 28 dolares</option>
						<option value="anual20">Un año 98 dolares</option>
					</select>
					@endif
					<div class="row">
						<div class="col-md-12">
							<label for="">
								Card number:
								<input type="text" data-stripe="number" class="form-control">
							</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label for="">Expiry year
								<input type="text" data-stripe="exp-year" class="form-control">
							</label>
						</div>
						<div class="col-md-4">
							<label for="">Expiry month
								<input type="text" data-stripe="exp-month" class="form-control">
							</label>
						</div>
						<div class="col-md-4">
							<label for="">CVC
								<input type="text" data-stripe="cvc" class="form-control">
							</label>
						</div>
					</div>
					<button class="btn btn-primary">make Payment</button>
				</form>
		 	</div>
	 	</div>
	 </div>
		
	 @endsection
	  @section('scripts')
		<script src="https://js.stripe.com/v2/"></script>
		<script>
			$(document).on('ready',function(){
				$('#subscription-form').find('.stripe-errors').hide();	
				Stripe.setPublishableKey('pk_test_jMDOqjio22xV8suzA73tqjLd');
				$('#subscription-form button').on('click',function(){
					var form = $('#subscription-form');
					var submit = form.find('button');
					var submitInitialText = submit.text();
					submit.attr('disabled' , 'disabled').text('Just one moment...');
					Stripe.card.createToken(form , function(status , response){
							var token ;
							if(response.error){	
								form.find('.alert-danger').text(response.error.message).show();	
								submit.removeAttr('disabled');
								submit.text(submitInitialText);
							}else{
								token = response.id;
								form.append($('<input type="hidden" name="token">').val(token));
								form.submit();
							}
					});
				});
			});
		</script>
	 @endsection