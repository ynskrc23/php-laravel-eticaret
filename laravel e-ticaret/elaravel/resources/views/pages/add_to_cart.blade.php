@extends('layout')
@section('content')



<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">

				<?php
				
				$contents=Cart::content();
				//echo'<pre>';
				//print_r($contents);
				//echo'<pre>';
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">İmage</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>

						<?php foreach($contents as $ct) {?>
						<tr>
							<td class="cart_product">
									
								<a href=""><img src="{{\Illuminate\Support\Facades\Storage::url($ct->options->image)}}" 
									style="width: 80px;; height: 80px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$ct->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$ct->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/update-cart')}}" method="post">
										{{ csrf_field() }}						
										<input type="text" class="cart_quantity_input" name="qty" value="{{$ct->qty}}" autocomplete="off" size="2" />
										<input type="hidden" name="Id" value="{{$ct->rowId}}">
										<input type="submit" name="submit" value="Update" 
										class="btn btn-sm btn-default"> 
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$ct->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$ct->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

							<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->



	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
		
				<div class="col-sm-9">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Count <span>{{Cart::count()}}</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>

							<a class="btn btn-default update" href="">Update</a>

							  <?php $customer_id = Session::get('customer_id'); ?>

                                <?php if($customer_id != NULL){?>

                                <a href="{{URL::to('/checkout')}}" style="margin-top:20px; margin-left:20px;" class="btn btn-info btn-sm"> Checkout </a> 

                                <?php } else{?>

								<a href="{{URL::to('/login-check')}}" style="margin-top:20px; margin-left:20px;" class="btn btn-danger btn-sm"> Checkout </a>

                                <?php } ?>

							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection