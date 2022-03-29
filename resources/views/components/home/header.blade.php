  <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!--Header Area Start-->
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="header-logo">
                            <a href="{{route('home.index')}}">
                                <img src="{{url('public/home')}}/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-6 visible-sm  col-xs-6">
                        <div class="header-right">
                            <ul>
                                <li class="shoping-cart">
                                    <a href="{{route('cart.view')}}">
                                        <i class="flaticon-shop"></i>
                                        <span>{{$cart->totalItem}}</span>
                                    </a>
                                    <div class="add-to-cart-product">
                                        @foreach($cart->items as $item)
                                            <div class="cart-product">
                                                <div class="cart-product-image">
                                                    <a href="">
                                                        <img src="{{url('public/uploads')}}/{{$item['image']}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="cart-product-info">
                                                    <p>
                                                        <span>{{$item['quantity']}}</span>
                                                        x
                                                        <a style="color: red;" href="">{{$item['name']}}</a>
                                                    </p>
                                                    <span class="cart-price">$ {{$item['price']}}</span>
                                                </div>
                                                <div class="cart-product-remove">
                                                    <a href="{{route('cart.remove',$item['id'])}}"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="total-cart-price">
                                            <div class="cart-product-line fast-line">
                                                <span>Shipping</span>
                                                <span class="free-shiping">$10</span>
                                            </div>
                                            <div class="cart-product-line">
                                                <span>Total</span>
                                                <span class="total">$ {{$cart->totalPrice}}</span>
                                            </div>
                                        </div>
                                        <div class="cart-checkout">
                                            <a href="{{route('order.check_out')}}">
                                                Check out
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @if(auth()->guard('kh')->check())
                                    <li>
                                        <a title="Logout" href="{{route('customer.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                    </li>
                                @else
                                    <li>
                                        <a title="Login" href="{{route('customer.login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>                    
                    <div class="col-md-9 col-sm-12 hidden-xs">
                        <div class="mainmenu text-center">
                            <nav>
                                <ul id="nav">
                                    <li><a href="{{route('home.index')}}">HOME</a></li>
                                    <li><a href="{{route('home.shop')}}">Shopping Page</a></li>
                                    <li><a href="{{route('home.contact')}}">Contact</a></li>
                                    <li><a href="{{route('home.blog')}}">blogs</a></li>
                                    <li><a href="#">pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('admin.index')}}">Admin</a></li>
                                            <li><a href="{{route('home.not')}}">404 Page</a></li>
                                        </ul>
                                    </li>
                                    @if(Auth::guard('kh')->check())
                                        <li><a href="{{route('customer.account')}}">Hi {{Auth::guard('kh')->user()->name}}</a></li>
                                    @else
                                    
                                    @endif
                                </ul>
                            </nav>
                        </div>                        
                    </div>
                    <div class="col-md-1 hidden-sm">
                        <div class="header-right">
                            <ul>
                                @if(auth()->guard('kh')->check())
                                    <li>
                                        <a title="Logout" href="{{route('customer.logout')}}" onclick="return confirm('Are you sure you want to sign out ?')"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                    </li>
                                @else
                                    <li>
                                        <a title="Login" href="{{route('customer.login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                    </li>
                                @endif
                                <li class="shoping-cart">
                                    <a href="{{route('cart.view')}}">
                                        <i class="flaticon-shop"></i>
                                        <span>{{$cart->totalItem}}</span>
                                    </a>
                                    <div class="add-to-cart-product">
                                        @foreach($cart->items as $item)
                                            <div class="cart-product">
                                                <div class="cart-product-image">
                                                    <a href="">
                                                        <img src="{{url('public/uploads')}}/{{$item['image']}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="cart-product-info">
                                                    <p>
                                                        <span>{{$item['quantity']}}</span>
                                                        x
                                                        <a style="color: red;" href="">{{$item['name']}}</a>
                                                    </p>
                                                    <span class="cart-price">$ {{$item['price']}}</span>
                                                </div>
                                                <div class="cart-product-remove">
                                                    <a href="{{route('cart.remove',$item['id'])}}"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="total-cart-price">
                                            <div class="cart-product-line fast-line">
                                                <span>Shipping</span>
                                                <span class="free-shiping">$10</span>
                                            </div>
                                            <div class="cart-product-line">
                                                <span>Total</span>
                                                <span class="total">$ {{$cart->totalPrice}}</span>
                                            </div>
                                        </div>
                                        <div class="cart-checkout">
                                            <a href="{{route('order.check_out')}}">
                                                Check out
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header Area End-->
		<!-- Mobile Menu Start -->
		<div class="mobile-menu-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="mobile-menu">
							<nav id="dropdown">
								<ul>
                                    <li><a href="{{route('home.index')}}">HOME</a></li>
                                    <li><a href="{{route('home.shop')}}">Shopping Page</a></li>
                                    <li><a href="{{route('home.about')}}">ABOUT AUTHOR</a></li>
                                    <li><a href="{{route('home.contact')}}">Contact</a></li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="{{route('admin.index')}}">Admin</a></li>
                                            <li><a href="{{route('home.not')}}">404 Page</a></li>
                                        </ul>
                                    </li>
                                    @if(Auth::guard('kh')->check())
                                    <li><a href="{{route('customer.account')}}">Hi {{Auth::guard('kh')->user()->id}}</a></li>
                                    @else
                                    @endif
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>	