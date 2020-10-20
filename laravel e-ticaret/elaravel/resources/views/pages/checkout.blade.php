@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shopping Detay</p>
							<div class="form-one">
							<form action="{{url('/shopping-save')}}" method="post">
										{{ csrf_field() }}							
									<input type="text" name="shopping_email" placeholder="Email">
									<input type="text" name="shopping_first_name" placeholder="First Name">					
									<input type="text" name="shopping_last_name" placeholder="Last Name">
									<input type="text" name="shopping_adres" placeholder="Address 1">
									<input type="text" name="shopping_mobile_number" placeholder="Mobile No">
									<input type="text" name="shopping_ctiy" placeholder="City">		

									<button type="submit" class="btn btn-success pull-right">Save</button>
								</form>
							</div>							
						</div>
					</div>									
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection