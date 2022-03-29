@extends('layouts.home')
@section('title', 'Cart')
@section('main')
@section('css')
<style>
.empty {
    background: rgb(255, 255, 255);
    padding: 40px 20px;
    border-radius: 4px;
    text-align: center;
    width: 100%;
}

p {
    font-size: 17px;
    color: black;
    margin-top: 15px;
}

.empty__btn {
    background-color: rgb(253, 216, 53);
    color: rgb(74, 74, 74);
    font-weight: 500;
    padding: 10px 55px;
    display: inline-block;
    border-radius: 4px;
}
</style>
@stop()
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
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 empty text-center">
                <img style="width:190px;height:160px" src="{{url('public/home')}}/img/cart.png" alt="">
                <p style="font">Không có sản phẩm nào trong giỏ hàng của bạn.</p>
                <a href="{{route('home.index')}}" class="empty__btn">Tiếp tục mua sắm</a>
            </div>
        </div>
        <hr class="divider-w">
    </div>
</section>
@stop()