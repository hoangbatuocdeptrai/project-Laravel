@extends('layouts.home')
@section('title', 'Checkout')
@section('main')
<input type="hidden" name="cus_name" value="{{$customer->name}}">
<input type="hidden" name="cus_address" value="{{$customer->address}}">
<input type="hidden" name="cus_email" value="{{$customer->email}}">
<input type="hidden" name="cus_phone" value="{{$customer->phone}}">
@foreach($ban as $bn)
<div class="breadcrumbs-area" style="background-image: url('{{url('public/uploads')}}/{{$bn->img_borrower}}');background-size: 100% 345px;">
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
                <form action="{{route('borrower.post_check_borrower')}}" method="post">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                    <input type="hidden" name="quantity" value="{{$cart->totalQuantity}}">
                    <input type="hidden" name="total_price" value="{{$cart->totalPrice}}">
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
                                                <input type="text" name="name" placeholder="Company Name">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="form-row">
                                                <input type="text" name="address" placeholder="Street address">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row">
                                                <input type="email" name="email" placeholder="Email Address *">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row">
                                                <input type="text" name="phone" placeholder="Phone *">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="form-row">
                                                <input type="text" name="id_card" placeholder="ID Card">
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
                                    <a href="#collapseTwo" role="button" data-toggle="collapse" data-parent="#accordion"
                                        aria-expanded="false" aria-controls="collapseTwo"
                                        class="btn btn-info btn-md">Continue</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed">
                                        <span>2</span>
                                        Order Review({{$cart->totalItem}})
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingThree">
                                <div class="panel-body no-padding">
                                    <div class="order-review" id="checkout-review">
                                        <div class="table-responsive" id="checkout-review-table-wrapper">
                                            <table class="data-table" id="checkout-review-table">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1">Product Image</th>
                                                        <th rowspan="1">Product Name</th>
                                                        <th rowspan="1">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($cart->items as $item)
                                                    <tr>
                                                        <td>
                                                            <h3 class="product-name">{{$item['name']}}</h3>
                                                        </td>
                                                        <td>
                                                            <img src="{{url('public/uploads')}}/{{$item['image']}}"
                                                                width="60" alt="">
                                                        </td>
                                                        <td>{{$item['quantity']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3"><strong>Total Quantity</strong></td>
                                                        <td><strong><span
                                                                    class="check-price">{{$cart->totalQuantity}}</span></strong>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div id="checkout-review-submit">
                                            <div class="cart-btn-3" id="review-buttons-container">
                                                <p class="left">Forgot an Item? <a href="{{route('cart.view')}}">Edit
                                                        Your Cart</a></p>
                                                <button type="submit" title="Place Order"
                                                    class="btn btn-default"><span>Place Order</span></button>
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
$('#is_me').click(function() {
    var checked = $(this).is(':checked');
    if (checked) {
        var name = $('input[name="cus_name"]').val();
        var email = $('input[name="cus_email"]').val();
        var phone = $('input[name="cus_phone"]').val();
        var address = $('input[name="cus_address"]').val();
        $('input[name="name"]').val(name);
        $('input[name="email"]').val(email);
        $('input[name="phone"]').val(phone);
        $('input[name="address"]').val(address);

    } else {
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