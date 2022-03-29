@extends('layouts.home')
@section('title', 'Cart')
@section('main')
<!-- Breadcrumbs Area Start -->
@foreach($ban as $bn)
<div class="breadcrumbs-area" style="background-image: url('{{url('public/uploads')}}/{{$bn->img_cart}}');background-size: 100% 345px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>SHOPPING CART</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Breadcrumbs Area Start -->
<!-- Cart Area Start -->
<div class="shopping-cart-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wishlist-table-area table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-remove">Remove</th>
                                <th class="product-image">Image</th>
                                <th class="t-product-name">Product Name</th>
                                <th class="product-unit-price">Unit Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-edit">Update</th>
                                <th class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->items as $item)
                                <tr>
                                    <td class="product-remove">
                                        <a href="{{route('cart.remove',$item['id'])}}">
                                            <i class="flaticon-delete"></i>
                                        </a>
                                    </td>
                                    <td class="product-image">
                                        <img style="width: 80px;" src="{{url('public/uploads')}}/{{$item['image']}}" alt="">
                                    </td>
                                    <td class="t-product-name">
                                        <h3>
                                            <a href="{{route('home.product-detail',[$item['id'],Str::slug($item['name'])])}}">{{$item['name']}}</a>
                                        </h3>
                                    </td>
                                    <td class="product-unit-price">
                                        <p>$ {{$item['price']}}</p>
                                    </td>
                                    <form action="{{route('cart.update', $item['id'])}}">
                                        <td class="product-quantity product-cart-details">
                                            <input type="number" name="quantity" value="{{$item['quantity']}}">
                                        </td>
                                        <td class="product-edit">
                                            <button class="btn btn-sm btn-success">Update</button>
                                        </td>
                                    </form>
                                    <td class="product-quantity">
                                        <p>$ {{$item['quantity'] * $item['price']}}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="shopingcart-bottom-area">
                    <a class="left-shoping-cart" href="{{route('home.index')}}">CONTINUE SHOPPING</a>
                    <div class="shopingcart-bottom-area pull-right">
                        <a class="right-shoping-cart" href="{{route('cart.clear')}}">CLEAR SHOPPING CART</a>
                        <a class="right-shoping-cart" href="{{route('borrower.check_borrower')}}">Borrower</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
<!-- Discount Area Start -->
<div class="discount-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="discount-main-area">
                    <div class="discount-top">
                        <h3>DISCOUNT CODE</h3>
                        <p>Enter your coupon code if have one</p>
                    </div>
                    <form action="" method="post">
                        <div style="padding: 20px 70px;" class="discount-middle">
                            @csrf
                            <input type="text" name="code" placeholder="Pleas enter Code">
                            <button style="border-radius: 20px;" class="btn btn-lg btn-info">APPLY COUPON</button>
                        </div>
                    </form>
                    <a href="{{route('cart.code')}}"><p>Code?</p></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="subtotal-main-area">
                    <div class="subtotal-area">
                        @if(auth()->guard('kh')->check())
                            <h2>SUBTOTAL<span>$ {{$customer->status_code == 1 ? $cart->totalCode : $cart->totalPrice}}</span></h2>
                        @else
                            <h2>SUBTOTAL<span>$ {{$cart->totalPrice}}</span></h2>
                        @endif
                    </div>
                    <a href="{{route('order.check_out')}}">CHECKOUT</a>
                    <p>Checkout With Multiple Addresses</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Discount Area End -->
@stop()