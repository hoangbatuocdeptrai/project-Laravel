@extends('layouts.home')
@section('title', 'Checkout')
@section('main')
<input type="hidden" name = "cus_name" value="{{$customer->name}}">
<input type="hidden" name = "cus_address" value="{{$customer->address}}">
<input type="hidden" name = "cus_email" value="{{$customer->email}}">
<input type="hidden" name = "cus_phone" value="{{$customer->phone}}">
@foreach($ban as $bn)
<div class="breadcrumbs-area" style="background-image: url('{{url('public/uploads')}}/{{$bn->img_cart}}');background-size: 100% 345px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>Checkout List</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li>Checkout List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Breadcrumbs Area Start -->
<!-- Check Out Area Start -->
<div class="check-out-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name = "customer_id" value="{{$customer->id}}">
                    <input type="hidden" name = "total_price" value="{{$customer->status_code == 1 ? $cart->totalCode : $cart->totalPrice}}">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <span>1</span>
                                    Billing Information
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="form-row">
                                            <input type="text" name = "name" placeholder="Company Name">
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="form-row">
                                            <input type="text" name = "address" placeholder="Street address">
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="form-row">
                                            <input type="email" name = "email" placeholder="Email Address *">
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="form-row">
                                            <input type="text" name = "phone" placeholder="Phone *">
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="checbox-info">
                                            <input id="is_me" type="checkbox">
                                            Create an account?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-set">
                                <a href="#collapseTwo" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" class="btn btn-info btn-md">Continue</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" >
                                    <span>2</span>
                                    Shopping Method
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="different-address">
                                    <div class="ship-different-title">
                                        <h3>
                                            <label>Ship to a different address?</label>
                                        </h3>
                                    </div>
                                    <div class="order-notes">
                                        <label>Order Notes</label>
                                        <textarea name ="notes" placeholder="Notes about your order, e.g. special notes for delivery."
                                            rows="10" cols="30" id="checkout-mess"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-set">
                                <a href="#collapseThree" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" class="btn btn-info btn-md">Continue</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed">
                                    <span>3</span>
                                    Payment Information
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body no-padding">
                                <div class="payment-met">
                                    <div id="payment-form">
                                        <ul class="form-list">
                                            <li class="control">
                                                <input type="radio" class="radio" title="Check / Money order"
                                                    name="payment" value="1" id="p_method_checkmo">
                                                <i class="fa fa-money" aria-hidden="true"></i>  Check / Money order
                                            </li>
                                            <li class="control">
                                                <input type="radio" class="radio" title="Credit Card (saved)"
                                                    name="payment" value="2" id="p_method_ccsave">
                                                <i  class="fa fa-credit-card" aria-hidden="true"></i>  Credit Card (saved)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-set">
                                <a href="#collapseFour" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour" class="btn btn-info btn-md">Continue</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed">
                                    <span>4</span>
                                    Order Review ({{$cart->totalItem}})
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingFour">
                            <div class="panel-body no-padding">
                                <div class="order-review" id="checkout-review">
                                    <div class="table-responsive" id="checkout-review-table-wrapper">
                                        <table class="data-table" id="checkout-review-table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="1">Product Name</th>
                                                    <th rowspan="1">Product Name</th>
                                                    <th colspan="1">Price</th>
                                                    <th rowspan="1">Qty</th>
                                                    <th colspan="1">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cart->items as $item)
                                                    <tr>
                                                        <td>
                                                            <h3 class="product-name">{{$item['name']}}</h3>
                                                        </td>
                                                        <td>
                                                            <img src="{{url('public/uploads')}}/{{$item['image']}}" width="60" alt="">
                                                        </td>
                                                        <td><span class="cart-price"><span
                                                                    class="check-price">${{$item['price']}}</span></span></td>
                                                        <td>{{$item['quantity']}}</td>
                                                        <!-- sub total starts here -->
                                                        <td><span class="cart-price"><span
                                                                    class="check-price">${{$item['quantity'] * $item['price']}}</span></span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3">Subtotal</td>
                                                    <td><span class="check-price">${{$customer->status_code == 1 ? $cart->totalCode : $cart->totalPrice}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Shipping Handling (Flat Rate - Fixed)</td>
                                                    <td><span class="check-price">$10.00</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><strong>Grand Total</strong></td>
                                                    <td><strong><span class="check-price">${{$customer->status_code == 1 ? $cart->totalCode : $cart->totalPrice}}</span></strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div id="checkout-review-submit">
                                        <div class="cart-btn-3" id="review-buttons-container">
                                            <p class="left">Forgot an Item? <a href="{{route('cart.view')}}">Edit Your Cart</a></p>
                                            <button type="submit" title="Place Order" class="btn btn-default"><span>Place Order</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-offset-1 col-md-3">
                <div class="checkout-widget">
                    <h2 class="widget-title">YOUR CHECKOUT PROGRESS</h2>
                    <ul>
                        <li><a href="#"><i class="fa fa-minus"></i> Billing Address</a></li>
                        <li><a href="#"><i class="fa fa-minus"></i> Shipping Address</a></li>
                        <li><a href="#"><i class="fa fa-minus"></i> Shipping Method</a></li>
                        <li><a href="#"><i class="fa fa-minus"></i> Payment Method</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Check Out Area End -->
<!-- Our Team Area Start -->
<div class="our-team-area">
    <h2 class="section-title">OUR WRITER</h2>
    <div class="container">
        <div class="row">
            <div class="team-list indicator-style">
                @foreach($author as $item)
                    <div class="col-md-3">
                        <div class="single-team-member">
                            <a href="#">
                                <img src="{{url('public/uploads')}}/{{$item->image}}" alt="">
                            </a>
                            <div class="member-info">
                                <a href="#">{{$item->name}}</a>
                                <p>WRITER</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@section('js')
	<script>
		$('#is_me').click(function(){
			var checked = $(this).is(':checked');
			if(checked){
				var name = $('input[name="cus_name"]').val();
				var email = $('input[name="cus_email"]').val();
				var phone = $('input[name="cus_phone"]').val();
				var address = $('input[name="cus_address"]').val();
				$('input[name="name"]').val(name);
				$('input[name="email"]').val(email);
				$('input[name="phone"]').val(phone);
				$('input[name="address"]').val(address);

			}else{
				$('input[name="name"]').val('');
				$('input[name="email"]').val('');
				$('input[name="phone"]').val('');
				$('input[name="address"]').val('');
			}
		});
	</script>
@stop()
<!-- Our Team Area End -->
@stop()