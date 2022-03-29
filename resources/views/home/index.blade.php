@extends('layouts.home')
@section('title', 'Home One')
@section('main')
<!-- slider Area Start -->
<div class="slider-area">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider" class="slides" style="height:920px !important;">
            @foreach($slides as $model)
            <img src="{{url('public/uploads')}}/{{$model->image}}" alt="" title="#slider-direction-{{$model->id}}" style="width:100%;height:920px !important;"/>
            @endforeach
        </div>
        @foreach($slides as $models)
        <!-- direction 1 -->
        <div id="slider-direction-{{$models->id}}" class="text-center slider-direction">
            <!-- layer 1 -->
            <div class="layer-1">
                <h2 class="title-1">LET’S WRITE IMAGINE</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
                <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <!-- layer 3 -->
            <div class="layer-3">
                <a href="#" class="title-3">SEE MORE</a>
            </div>
            <!-- layer 4 -->
            <div class="layer-4">
                <form action="#" class="title-4">
                    <input type="text" placeholder="Enter your book title here">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- slider Area End-->
<!-- Online Banner Area Start -->
<div class="online-banner-area">
    <div class="container">
        <div class="banner-title text-center">
            <h2>ONLINE <span>BOOK STORE</span></h2>
            <p>The Online Books Guide is the biggest big store and the biggest books library in the world that
                has alot of the popular and the most top category books presented here. Top Authors are here
                just subscribe your email address and get updated with us.</p>
        </div>
        @foreach($ban as $bn)
        <div class="row">
            <div class="banner-list">
                <div class="col-md-4 col-sm-6">
                    <div class="single-banner">
                        <a href="{{route('home.shop')}}" style="width:100%;height:300px;">
                            <img src="{{url('public/uploads')}}/{{$bn->img_home_store_1}}" alt="" style="height:inherit;width:100%;">
                        </a>
                        <div class="price"><span>$</span>160</div>
                        <div class="banner-bottom text-center">
                            <a href="{{route('home.shop')}}">NEW RELEASE 2019</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-banner">
                        <a href="{{route('home.shop')}}" style="width:100%;height:300px;">
                            <img src="{{url('public/uploads')}}/{{$bn->img_home_store_2}}" alt="" style="height:inherit;width:100%;">
                        </a>
                        <div class="price"><span>$</span>160</div>
                        <div class="banner-bottom text-center">
                            <a href="{{route('home.shop')}}">NEW RELEASE 2020</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm">
                    <div class="single-banner">
                        <a href="{{route('home.shop')}}" style="width:100%;height:300px;">
                            <img src="{{url('public/uploads')}}/{{$bn->img_home_store_3}}" alt="" style="height:inherit;width:100%;">
                        </a>
                        <div class="price"><span>$</span>160</div>
                        <div class="banner-bottom text-center">
                            <a href="{{route('home.shop')}}">NEW RELEASE 2021</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Online Banner Area End -->
@foreach($ban as $bn)
<!-- Shop Info Area Start -->
<div class="shop-info-area" style="background:url('{{url('public/uploads')}}/{{$bn->img_home_order}}');">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-transport"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>FREE SHIPPING</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-money"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>FREE SHIPPING</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-sm">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-school"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>FREE SHIPPING</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Shop Info Area End -->
<!-- Featured Product Area Start -->
<div class="featured-product-area section-padding">
    <h2 class="section-title">FEATURED PRODUCTS</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-menu">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="first-item active">
                            <a href="#arrival" aria-controls="arrival" role="tab" data-toggle="tab">New
                                Arrival</a>
                        </li>
                        <li role="presentation">
                            <a href="#sale" aria-controls="sale" role="tab" data-toggle="tab">BEST SELLERS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-list tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="arrival">
                    <div class="featured-product-list indicator-style">
                        @foreach($product as $model)
                        <div class="single-p-banner">
                            <div class="col-md-3">
                                <div class="single-banner">
                                    <div class="product-wrapper">
                                        <a href="#" class="single-banner-image-wrapper">
                                            <img alt="" src="{{url('public/uploads')}}/{{$model->image}}">
                                            <div class="price">
                                                <span>$</span>{{$model->sale_price > 0 ? number_format($model->sale_price) : $model->price}}
                                            </div>
                                            <div class="rating-icon">
                                                <div id="avg_rateYoItem-{{$model->id}}" style="margin:0 auto;"></div>
                                            </div>
                                        </a>
                                        <div class="product-description">
                                            <div class="functional-buttons">
                                                <a href="{{route('cart.add',$model->id)}}" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                @if(auth()->guard('kh')->check())
                                                @if($model->check_in_favorite() > 0)
                                                <a href="{{route('favorite.remove',$model->id)}}"
                                                    style="background-color: red;">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                                @else
                                                <a href="{{route('favorite.add',$model->id)}}" title="Add to Wishlist">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                                @endif
                                                @endif
                                                <a href="#" title="Quick view" data-toggle="modal"
                                                    data-target="#productModal{{$model->id}}">
                                                    <i class="fa fa-compress"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="height:50px" class="banner-bottom text-center">
                                        <a
                                            href="{{route('home.product-detail',[$model->id,Str::slug($model->name)])}}">{{$model->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                        <script>
                        $(function() {
                            $("#avg_rateYoItem-" + "{{$model->id}}").rateYo({
                                rating: "{{$model->rat->avg('rating_start')}}",
                                starWidth: "16px",
                                normalFill: "#c8c8c8",
                                ratedFill: "#32b5f3",
                                readOnly: true
                            });
                        })
                        </script>
                        @endforeach
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="sale">
                    <div class="featured-product-list indicator-style">
                        @foreach($proHot as $hot)
                        <div class="single-p-banner">
                            <div class="col-md-3">
                                <div class="single-banner">
                                    <div class="product-wrapper">
                                        <a href="#" class="single-banner-image-wrapper">
                                            <img alt="" src="{{url('public/uploads')}}/{{$hot->image}}">
                                            <div class="price">
                                                <span>$</span>{{$hot->sale_price > 0 ? number_format($hot->sale_price) : $hot->price}}
                                            </div>
                                            <div class="rating-icon">
                                                <div id="avg_rateYoItemPro-{{$hot->id}}" style="margin:0 auto;"></div>
                                            </div>
                                        </a>
                                        <div class="product-description">
                                            <div class="functional-buttons">
                                                <a href="{{route('cart.add',$hot->id)}}" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                                <a href="#" title="Quick view" data-toggle="modal"
                                                    data-target="#productModal{{$hot->id}}">
                                                    <i class="fa fa-compress"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="height:50px" class="banner-bottom text-center">
                                        <a
                                            href="{{route('home.product-detail',[$hot->id,Str::slug($hot->name)])}}">{{$hot->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                        <script>
                        $(function() {
                            $("#avg_rateYoItemPro-" + "{{$hot->id}}").rateYo({
                                rating: "{{$hot->rat->avg('rating_start')}}",
                                starWidth: "16px",
                                normalFill: "#c8c8c8",
                                ratedFill: "#32b5f3",
                                readOnly: true
                            });
                        })
                        </script>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured Product Area End -->
@foreach($ban as $bn)
<!-- Testimonial Area Start -->
<div class="testimonial-area text-center" style="background-image:url('{{url('public/uploads')}}/{{$bn->img_home_comment}}');height:595;">
    <div class="container">
        <div class="testimonial-title">
            <h2>OUR TESTIMONIAL</h2>
            <p>What our clients say about the books reviews and comments</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-list">
                    @foreach($contact as $cont)
                    <div class="single-testimonial">
                        <img src="{{url('public/uploads')}}/{{$cont->cus->image}}" alt="">
                        <div class="testmonial-info clearfix">
                            <p>{{$cont->message}}. </p>
                            <div class="testimonial-author text-center">
                                <h3>{{$cont->name}}</h3>
                                <p>The Author</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Testimonial Area End -->
<!-- Counter Area Start -->
<div class="counter-area section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">{{$proCount->count()}}</span>
                        </span>
                        <h3>BOOKS READ</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">{{$customer->count()}}</span>
                        </span>
                        <h3>ONLINE USERS</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">{{$author->count()}}</span>
                        </span>
                        <h3>BEST AUTHORS</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">15</span>
                        </span>
                        <h3>AWARDS</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Area End -->
<!-- Blog Area Start -->
<div class="blog-area section-padding">
    <h2 class="section-title">LATEST BLOG</h2>
    <p>The Latest Blog post for the biggest Blog for the books Library.</p>
    <div class="container">
        <div class="row">
            <div class="blog-list indicator-style">
                @foreach($blog as $bl)
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="single-#" style="width:100%;height:171px;">
                            <img src="{{url('public/upload')}}/{{$bl->image}}" alt="" width="100%" style="height: inherit;">
                        </a>
                        <div class="blog-info text-center">
                            <a href="{{route('home.blog-view',$bl->id)}}" style="float:left;margin-top:5px;">
                                <h2>{{$bl->name}}</h2>
                            </a>
                            <div class="blog-info-bottom">
                                <span class="blog-author">BY: <a href="#">LATEST</a></span>
                                <span class="blog-date">{{$bl->created_at->format('dD M Y')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--Quickview Product Start -->
<div id="quickview-wrapper">
    <!-- Modal -->
    @foreach($product as $model)
    <div class="modal fade" id="productModal{{$model->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <div class="product-images">
                            <div class="main-image images">
                                <img alt="" src="{{url('public/uploads')}}/{{$model->image}}">
                            </div>
                        </div>
                        <div class="product-info">
                            <h1>{{$model->name}}</h1>
                            <div class="price-box">
                                <p class="s-price"><span class="special-price"><span
                                            class="amount">${{$model->sale_price > 0 ? number_format($model->sale_price) : $model->price}}</span></span>
                                </p>
                            </div>
                            <a href="{{route('home.product-detail',[$model->id,Str::slug($model->name)])}}"
                                class="see-all">See all features</a>
                            <div class="quick-add-to-cart">
                                <form action="{{route('cart.add',$model->id)}}" method="get" class="cart">
                                    <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                </form>
                            </div>
                            <div class="quick-desc">
                                {!!Str::words($model->description,30)!!}
                            </div>
                            <div class="social-sharing">
                                <div class="widget widget_socialsharing_widget">
                                    <h3 class="widget-title-modal">Share this product</h3>
                                    <ul class="social-icons">
                                        <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li><a target="_blank" title="Pinterest" href="#"
                                                class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                        <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .product-info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop()