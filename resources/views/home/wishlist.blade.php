@extends('layouts.home')
@section('title', 'Wishlist')
@section('main')
<!-- Breadcrumbs Area Start -->
@foreach($ban as $bn)
<div class="breadcrumbs-area" style="background-image: url('{{url('public/uploads')}}/{{$bn->img_product_detail}}');background-size: 100% 345px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>Wishlist</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Breadcrumbs Area Start -->
<!-- Shop Area Start -->
<div class="shopping-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-widget">
                    <div class="shop-widget-top">
                        <aside class="widget widget-categories">
                            <h2 class="sidebar-title text-center">CATEGORY</h2>
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        LEARNING
                                        <span>(5)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        LIGHTING
                                        <span>(8)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        LIVING ROOMS
                                        <span>(4)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        LAMP
                                        <span>(7)</span>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget shop-filter">
                            <h2 class="sidebar-title text-center">PRICE SLIDER</h2>
                            <div class="info-widget">
                                <div class="price-filter">
                                    <div id="slider-range"></div>
                                    <div class="price-slider-amount">
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                        <div class="widget-buttom">
                                            <input type="submit" value="Filter" />
                                            <input type="reset" value="CLEAR" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="shop-widget-bottom">
                        <aside class="widget widget-tag">
                            <h2 class="sidebar-title">POPULAR TAG</h2>
                            <ul class="tag-list">
                                <li>
                                    <a href="#">e-book</a>
                                </li>
                                <li>
                                    <a href="#">writer</a>
                                </li>
                                <li>
                                    <a href="#">book’s</a>
                                </li>
                                <li>
                                    <a href="#">eassy</a>
                                </li>
                                <li>
                                    <a href="#">nice</a>
                                </li>
                                <li>
                                    <a href="#">author</a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget widget-seller">
                            <h2 class="sidebar-title">TOP SELLERS</h2>
                            <div class="single-seller">
                                <div class="seller-img">
                                    <img src="{{url('public/home')}}/img/shop/1.jpg" alt="" />
                                </div>
                                <div class="seller-details">
                                    <a href="shop.html">
                                        <h5>Book’s</h5>
                                    </a>
                                    <h5>$ 50.00</h5>
                                    <ul>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-seller">
                                <div class="seller-img">
                                    <img src="{{url('public/home')}}/img/shop/2.jpg" alt="" />
                                </div>
                                <div class="seller-details">
                                    <a href="">
                                        <h5>Book’s</h5>
                                    </a>
                                    <h5>$ 50.00</h5>
                                    <ul>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="wishlist-right-area table-responsive">
                    <table class="wish-list-table">
                        <thead>
                            <tr>
                                <th class="t-product-name">Products</th>
                                <th class="product-details-comment">Product Details</th>
                                <th class="product-price-cart">Add To Cart</th>
                                <th class="w-product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($favorite as $item)
                                <tr>
                                    <td class="product-image">
                                        <a href="#">
                                            <img src="{{url('public/uploads')}}/{{$item->prods->image}}" alt="">
                                        </a>
                                    </td>
                                    <td class="product-details">
                                        <h4>{{$item->prods->name}}</h4>
                                        <p>{!!Str::words($item->prods->description,30)!!}</p>
                                    </td>
                                    <form action="{{route('cart.add',$item->prods->id)}}" method="get">
                                        <td class="product-cart">
                                            <div class="product-cart-details">
                                                <span>$ {{$item->prods->sale_price > 0 ? $item->prods->sale_price : $item->prods->price}}</span>
                                                    <input type="submit" value="ADD TO CART">
                                            </div>
                                        </td>
                                    </form>
                                    <td class="product-remove">
                                        <a href="{{route('favorite.remove',$item->prods->id)}}">
                                            <i class="flaticon-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="wishlist-bottom-link">
                    <a class="wishlist-single-link" href="{{route('home.index')}}">
                        <i class="fa fa-angle-double-left"></i>
                        Back
                    </a>
                    <div class="shopingcart-bottom-area wishlist-bottom-area pull-right">
                        <a href="#" class="right-shoping-cart">SHARE WISHLIST</a>
                        <a href="{{route('favorite.clear')}}" class="right-shoping-cart">Clear Favotite</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Area End -->
@stop()