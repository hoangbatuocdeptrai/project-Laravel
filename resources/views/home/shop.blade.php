@extends('layouts.home')
@section('title', 'Shop')
@section('main')
<!-- Breadcrumbs Area Start -->
@foreach($ban as $bn)
<div class="breadcrumbs-area" style="background-image: url('{{url('public/uploads')}}/{{$bn->img_shop}}');background-size: 100% 345px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>SHOP LEFT SIDEBAR</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li>SHOP LEFT SIDEBAR</li>
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
            <form action="" method="GET" action="" role="form">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="shop-widget">
                        <div class="shop-widget-top">
                            <div class="input-group" style="width: 250px;margin: 0 auto;">
                                <input type="text" id="input1-group2" name="keyword" placeholder="Enter book title..."
                                    value="{{request()->keyword}}" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <aside class="widget widget-categories" style="margin-top: 17px;">
                                <aside class="widget widget-categories">
                                    <h2 class="sidebar-title text-center">CATEGORY</h2>
                                    <ul class="sidebar-menu">
                                        <li>
                                            <a href="{{route('home.shop')}}">
                                                <i class="fa fa-angle-double-right"></i>
                                                All
                                            </a>
                                        </li>
                                        @foreach($cats as $cat)
                                        <li>
                                            <a
                                                href="{{route('home.category',['id'=>$cat->id, 'slug' => Str::slug($cat->name)])}}">
                                                <i class="fa fa-angle-double-right"></i>
                                                {{$cat->name}}
                                                <span>({{$cat->prods()->count()}})</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </aside>
                                <aside class="widget shop-filter">
                                    <h2 class="sidebar-title text-center">PRICE SLIDER</h2>
                                    <div class="info-widget">
                                        <div class="price-filter">
                                            <div id="slider-range"></div>
                                            <div class="price-slider-amount">

                                                <input type="text" id="amount" name="price" value=""
                                                    placeholder="Add Your Price" />
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
                                    @foreach($authors as $aut)
                                    <li>
                                        <a
                                            href="{{route('home.author',['id'=>$aut->id, 'slug' => Str::slug($aut->name)])}}">{{$aut->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="widget widget-seller">
                                <h2 class="sidebar-title">TOP SELLERS</h2>
                                @foreach($proHot as $hot)
                                <div class="single-seller">
                                    <div class="seller-img" style="width:104px;height:104px;">
                                        <img src="{{url('public/uploads')}}/{{$hot->image}}" alt="" width="100%" height="104"/>
                                    </div>
                                    <div class="seller-details">
                                        <a href="{{route('home.product-detail',[$hot->id,Str::slug($hot->name)])}}">
                                            <h5>{{$hot->name}}</h5>
                                        </a>
                                        <h5>$ {{$hot->sale_price > 0 ? $hot->sale_price : $hot->price}}</h5>
                                        <ul>
                                            <li><i class="fa fa-star icolor"></i></li>
                                            <li><i class="fa fa-star icolor"></i></li>
                                            <li><i class="fa fa-star icolor"></i></li>
                                            <li><i class="fa fa-star icolor"></i></li>
                                            <li><i class="fa fa-star icolor"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="shop-tab-area">
                        <div class="shop-tab-list">
                            <div class="shop-tab-pill pull-left">
                                <ul>
                                    <li class="active" id="left"><a data-toggle="pill" href="#home"><i
                                                class="fa fa-th"></i><span>Grid</span></a></li>
                                    <li><a data-toggle="pill" href="#menu1"><i
                                                class="fa fa-th-list"></i><span>List</span></a></li>
                                </ul>
                            </div>
                            <div class="shop-tab-pill pull-right">
                                <ul>
                                    <li class="shop-pagination">

                                    </li>
                                    
                                    <!-- <li class="shop-pagination"><a href="#"></a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="row tab-pane fade in active" id="home">
                                <div class="shop-single-product-area">
                                    @foreach($products as $pro)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="#" class="single-banner-image-wrapper">
                                                    <img alt="" src="{{url('public/uploads')}}/{{$pro->image}}" height="260">
                                                    <div class="price">
                                                        <span>$</span>{{$pro->sale_price > 0 ? $pro->sale_price : $pro->price}}
                                                    </div>
                                                </a>
                                                <div class="product-description">
                                                    <div class="functional-buttons">
                                                        <a href="{{route('cart.add',$pro->id)}}" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                        @if(auth()->guard('kh')->check())
                                                        @if($pro->check_in_favorite() > 0)
                                                        <a href="{{route('favorite.remove',$pro->id)}}"
                                                            style="background-color: red;">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        @else
                                                        <a href="{{route('favorite.add',$pro->id)}}"
                                                            title="Add to Wishlist">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        @endif
                                                        @endif
                                                        <a href="#" title="Quick view" data-toggle="modal"
                                                            data-target="#productModal{{$pro->id}}">
                                                            <i class="fa fa-compress"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <div class="banner-bottom-title">
                                                    <a
                                                        href="{{route('home.product-detail',[$pro->id,Str::slug($pro->name)])}}">{{$pro->name}}</a>
                                                </div>
                                                <div class="rating-icon">
                                                    <div id="avg_rateYoItem-{{$pro->id}}" style="margin:0 auto;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                                    <script>
                                    $(function() {
                                        $("#avg_rateYoItem-" + "{{$pro->id}}").rateYo({
                                            rating: "{{$pro->rat->avg('rating_start')}}",
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
                            <div id="menu1" class="tab-pane fade">
                                <div class="row">
                                    @foreach($products as $pro)
                                    <div class="single-shop-product">
                                        <div class="col-xs-12 col-sm-5 col-md-4">
                                            <div class="left-item">
                                                <a href="{{route('home.product-detail',[$pro->id,Str::slug($pro->name)])}}"
                                                    title="East of eden" style="height:260px;">
                                                    <img src="{{url('public/uploads')}}/{{$pro->image}}" alt="" height="260px">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-md-8">
                                            <div class="deal-product-content">
                                                <h4>
                                                    <a href="{{route('home.product-detail',[$pro->id,Str::slug($pro->name)])}}"
                                                        title="East of eden">{{$pro->name}}</a>
                                                </h4>
                                                <div class="product-price">
                                                    @if($pro->sale_price > 0)
                                                    <span class="new-price">$ {{$pro->sale_price}}.00</span>
                                                    <span class="old-price">$ {{$pro->price}}</span>
                                                    @else
                                                    <span class="new-price">$ {{$pro->price}}.00</span>
                                                    @endif
                                                </div>
                                                <div class="list-rating-icon">
                                                <div id="avg_rateYoItemPro-{{$pro->id}}"></div>
                                                </div>
                                                <p>{!!Str::words($pro->description,30)!!}</p>
                                                <div class="availability">
                                                    <span>{{$pro->cat->name}}</span>
                                                    <a href="{{route('cart.add',$pro->id)}}">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                                    <script>
                                    $(function() {
                                        $("#avg_rateYoItemPro-" + "{{$pro->id}}").rateYo({
                                            rating: "{{$pro->rat->avg('rating_start')}}",
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
            </form>
        </div>
        <div class="text-center">
            {{$products->appends(request()->all())->links()}}
        </div>
    </div>
</div>
<!--Quickview Product Start -->
<div id="quickview-wrapper">
    <!-- Modal -->
    @foreach($products as $model)
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
                            <div class="main-image images" style="height:260px;">
                                <img alt="" src="{{url('public/uploads')}}/{{$model->image}}" height="260">
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
                                <form method="post" class="cart">
                                    <div class="numbers-row">
                                        <input type="number" id="french-hens" value="3">
                                    </div>
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