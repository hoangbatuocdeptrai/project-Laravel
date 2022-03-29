@extends('layouts.home')
@section('title', 'Product Detail')
@section('main')
@foreach($ban as $bn)
<div class="breadcrumbs-area"
    style="background-image: url('{{url('public/uploads')}}/{{$bn->img_product_detail}}');background-size: 100% 345px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>PRODUCT DETAILS</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Breadcrumbs Area Start -->
<!-- Single Product Area Start -->
<div class="single-product-area section-padding" style="padding-bottom:unset;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7">
                <div class="single-product-image-inner">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="one">
                            <a class="venobox" href="{{url('public/uploads')}}/{{$product_detail->image}}"
                                data-gall="gallery" title="" width="570" height="550">
                                <img src="{{url('public/uploads')}}/{{$product_detail->image}}" alt="" width="570"
                                    height="550">
                            </a>
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="product-tabs" role="tablist">
                        @foreach($product_image as $image)
                        <li role="presentation" class="active">
                            <div role="tabpanel" class="tab-pane" id="three">
                                <a class="venobox" href="{{url('public/uploads')}}/{{$image->image}}"
                                    data-gall="gallery" title="" width="150" height="160">
                                    <img src="{{url('public/uploads')}}/{{$image->image}}" alt="" width="150"
                                        height="160">
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="single-product-details">
                    <div class="list-pro-rating">
                        <div id="avg_rateYo"></div>
                    </div>
                    <h2>{{$product_detail->name}}</h2>
                    <div class="availability">
                        <h4>Author:</h4>
                        <a href="{{route('home.info-author',$author->id)}}"><span>{{$author->name}}</span></a>
                    </div>
                    <p>{!!Str::words($author->description,30)!!}</p>
                    <div class="single-product-price">
                        <h2>${{$product_detail->sale_price > 0 ? number_format($product_detail->sale_price) : $product_detail->price}}
                        </h2>
                    </div>
                    <div class="product-attributes clearfix">
                        <span>
                            <a class="cart-btn btn-default" href="{{route('cart.add',$product_detail->id)}}">
                                <i class="flaticon-shop"></i>
                                Add to cart
                            </a>
                        </span>
                    </div>
                    @if(auth()->guard('kh')->check())
                    @if($product_detail->check_in_favorite() > 0)
                    <div class="add-to-wishlist">
                        <a style="color: red;" class="wish-btn" href="{{route('favorite.remove',$product_detail->id)}}">
                            <i class="fa fa-heart-o"></i>
                            Remove TO WISHLIST
                        </a>
                    </div>
                    @else
                    <div class="add-to-wishlist">
                        <a class="wish-btn" href="{{route('favorite.add',$product_detail->id)}}">
                            <i class="fa fa-heart-o"></i>
                            Add TO WISHLIST
                        </a>
                    </div>
                    @endif
                    @endif
                    <div class="single-product-categories">
                        <label>Categories:</label>
                        <span>{{$category->name}}</span>
                    </div>
                    <div class="social-share">
                        <label>Share: </label>
                        <ul class="social-share-icon">
                            <li><a href="#"><i class="flaticon-social"></i></a></li>
                            <li><a href="#"><i class="flaticon-social-1"></i></a></li>
                            <li><a href="#"><i class="flaticon-social-2"></i></a></li>
                        </ul>
                    </div>
                    <div id="product-comments-block-extra">
                        <ul class="comments-advices">
                            <li>
                                <a href="#" class="open-comment-form">Write a review</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area section-padding" style="padding-top: unset;">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="p-details-tab-content">
                    <div class="p-details-tab">
                        <ul class="p-details-nav-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info"
                                    role="tab" data-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#data" aria-controls="data" role="tab"
                                    data-toggle="tab">Review</a></li>
                            <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab"
                                    data-toggle="tab">Tab</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content review">
                        <div role="tabpanel" class="tab-pane active" id="more-info">
                            <p>{!!$product_detail->description!!}</p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="data">
                            @foreach($listRating as $list)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{url('public/uploads')}}/{{$list->cus->image}}"
                                        alt="Image" width="60" height="100">
                                </a>
                                <div class="media-body" style="border: 1px solid #ccc;padding: 5px 0 0 10px;">
                                    <h4 class="media-heading">{{$list->cus->name}}</h4>
                                    <div id="list_rateYo-{{$list->product_id}}"></div>
                                    <p>{{$list->message}}</p>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                            <script>
                            $(function() {
                                // đánh giá của từng khách hàng
                                $("#list_rateYo-" + "{{$list->product_id}}").rateYo({
                                    rating: "{{$list->rating_start}}",
                                    starWidth: "16px",
                                    normalFill: "#c8c8c8",
                                    ratedFill: "#32b5f3"
                                });
                            });
                            </script>
                            @endforeach
                            <h3 style="margin-top:10px;">ADD Review</h3>
                            @if(Auth::guard('kh')->check())
                            <form action="{{route('customer.rating')}}" id="formRating" method="post">
                                @csrf
                                <input type="hidden" class="form-control" name="product_id"
                                    value="{{$product_detail->id}}">
                                <div class="form-group">
                                    <label for="message">Your Rating</label>
                                    <input type="hidden" class="form-control" name="customer_id"
                                        value="{{auth()->guard('kh')->user()->id}}">

                                    <div id="rateYo-{{auth()->guard('kh')->user()->id}}"></div>

                                    <input type="hidden" name="rating_start" id="rating_start" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Review</label>
                                    <textarea class="form-control" rows="3" id="message" name="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                            </form>
                            @else
                            <div id="rateYo1"></div>
                            <div class="form-group">
                                <label for="message">Your Review</label>
                                <textarea class="form-control" rows="3" id="message" name="message"></textarea>
                            </div>
                            <a href="{{route('customer.login')}}" class="btn btn-default aa-review-submit"
                                style="padding-top:8px;">Submit</a>
                            @endif
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">
                            <div id="product-comments-block-tab">
                                <a href="#" class="comment-btn"><span>Be the first to write your review!</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product Area End -->
<!-- Related Product Area Start -->
<div class="related-product-area">
    <h2 class="section-title">RELATED PRODUCTS</h2>
    <div class="container">
        <div class="row">
            <div class="related-product indicator-style">
                @foreach($product as $item)
                <div class="col-md-3">
                    <div class="single-banner">
                        <div class="product-wrapper">
                            <a href="#" class="single-banner-image-wrapper">
                                <img alt="" src="{{url('public/uploads')}}/{{$item->image}}">
                                <div class="price">
                                    <span>$</span>{{$item->sale_price > 0 ? number_format($item->sale_price) : $item->price}}
                                </div>
                                <div class="rating-icon">
                                    <div id="avg_rateYoItem-{{$item->id}}"></div>
                                </div>
                            </a>
                            <div class="product-description">
                                <div class="functional-buttons">
                                    <a href="#" title="Add to Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a href="#" title="Add to Wishlist">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    <a href="#" title="Quick View">
                                        <i class="fa fa-compress"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div style="height:50px" class="banner-bottom text-center">
                            <a
                                href="{{route('home.product-detail',[$item->id,Str::slug($item->name)])}}">{{$item->name}}</a>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                <script>
                $(function() {
                    $("#avg_rateYoItem-" + "{{$item->id}}").rateYo({
                        rating: "{{$item->rat->avg('rating_start')}}",
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
<!-- Related Product Area End -->
@stop()
@section('js')

<script>
$(function() {
    @if($ratingAvg)
    let ratingAvg = '{{$ratingAvg}}';
    @else
    let ratingAvg = '0';
    @endif
    // trung bình của sản phẩm
    $("#avg_rateYo").rateYo({
        rating: ratingAvg,
        starWidth: "22px",
        normalFill: "#c8c8c8",
        ratedFill: "#32b5f3",
        readOnly: true
    });

    @if(auth()->guard('kh')-> check())
    // Lúc add and edit
    $("#rateYo-" + "{{auth()->guard('kh')->user()->id}}").rateYo({
        rating: ratingAvg,
        starWidth: "22px",
        normalFill: "#c8c8c8",
        ratedFill: "#32b5f3"
    }).on("rateyo.set", function(e, data) {
        $('#rating_start').val(data.rating);
        // alert("The rating is set to " + data.rating + "!");
    });
    @else
    @endif

    // Khi chưa đăng nhập
    $("#rateYo1").rateYo({
        rating: 3.6,
        starWidth: "22px",
        normalFill: "#c8c8c8",
        ratedFill: "#32b5f3"
    }).on("rateyo.set", function(e, data) {
        alert("Vui lòng đăng nhâp để đánh giá!");
        // alert("The rating is set to " + data.rating + "!");
    });;

});
</script>
@stop()