<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') || Witter</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('public/home')}}/img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->
        <!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Poppins:400,700,600,500,300' rel='stylesheet' type='text/css'>

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/animate.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/meanmenu.min.css">
		<!-- Font-Awesome css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/font-awesome.min.css">
		<!-- pe-icon-7-stroke css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/pe-icon-7-stroke.css">
		<!-- Flaticon css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/flaticon.css">
		<!-- venobox css -->
        <link rel="stylesheet" href="{{url('public/home')}}/venobox/venobox.css" type="text/css" media="screen" />
		<!-- nivo slider css -->
		<link rel="stylesheet" href="{{url('public/home')}}/lib/css/nivo-slider.css" type="text/css" />
		<link rel="stylesheet" href="{{url('public/home')}}/lib/css/preview.css" type="text/css" media="screen" />
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/owl.carousel.css">
		<!-- style css -->
		<link rel="stylesheet" href="{{url('public/home')}}/styles.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{url('public/home')}}/css/responsive.css">
		<!-- modernizr css -->
        <link rel="stylesheet" href="{{url('public/home')}}/toastr/toastr.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        <script src="{{url('public/home')}}/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
        <x-home.header />
		<!-- Mobile Menu End -->        
        @yield('main')
		<!-- Blog Area End -->
		<!-- News Letter Area Start -->
		<div class="newsletter-area text-center">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="newsletter-title">
		                    <h2>SUBSCRIBE OUR NEWSLETTER</h2>
		                    <p>Subscribe here with your email us and get up to date.</p>
		                </div>
		                <div class="letter-box">
		                    <form action="#" method="post" class="search-box">
		                        <div>
                                    <input type="text" placeholder="Subscribe us">
                                    <button type="submit" class="btn btn-search">SUBSCRIBE<span><i class="flaticon-school-1"></i></span></button>
                                </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- News Letter Area End -->
		<!-- Footer Area Start -->
		<footer>
		    <div class="footer-top-area">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-3 col-sm-8">
		                    <div class="footer-left">
		                        <a href="{{route('home.index')}}">
		                            <img src="{{url('public/home')}}/img/logo-2.png" alt="">
		                        </a>
		                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
		                        <ul class="footer-contact">
		                            <li>
		                                <i class="flaticon-location"></i>
		                                450 fifth Avenue, 34th floor. NYC
		                            </li>
		                            <li>
		                                <i class="flaticon-technology"></i>
		                                (+800) 123 4567 890
		                            </li>
		                            <li>
		                                <i class="flaticon-web"></i>
		                                info@bookstore.com
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="col-md-2 col-sm-4">
		                    <div class="single-footer">
		                        <h2 class="footer-title">Information</h2>
		                        <ul class="footer-list">
		                            <li><a href="{{route('home.about')}}">About Us</a></li>
		                            <li><a href="#">Delivery Information</a></li>
		                            <li><a href="#">Privacy & Policy</a></li>
		                            <li><a href="#">Terms & Conditions</a></li>
		                            <li><a href="#">Manufactures</a></li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="col-md-2 hidden-sm">
		                    <div class="single-footer">
		                        <h2 class="footer-title">My Account</h2>
		                        <ul class="footer-list">
		                            <li><a href="{{route('customer.account')}}">My Account</a></li>
		                            <li><a href="{{route('customer.login')}}">Login</a></li>
		                            <li><a href="{{route('cart.view')}}">My Cart</a></li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="col-md-2 hidden-sm">
		                    <div class="single-footer">
		                        <h2 class="footer-title">Shop</h2>
		                        <ul class="footer-list">
		                            <li><a href="#">Orders & Returns</a></li>
		                            <li><a href="#">Search Terms</a></li>
		                            <li><a href="#">Advance Search</a></li>
		                            <li><a href="#">Affiliates</a></li>
		                            <li><a href="#">Group Sales</a></li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="col-md-3 col-sm-8">
		                    <div class="single-footer footer-newsletter">
		                        <h2 class="footer-title">Our Newsletter</h2>
		                        <p>Consectetur adipisicing elit se do eiusm od tempor incididunt ut labore et dolore magnas aliqua.</p>
		                        <form action="#" method="post">
		                            <div>
		                                <input type="text" placeholder="email address">
		                            </div>
		                            <button class="btn btn-search btn-small" type="submit">SUBSCRIBE</button>
		                            <i class="flaticon-networking"></i>
		                        </form>
		                        <ul class="social-icon">
		                            <li>
		                                <a href="#">
		                                    <i class="flaticon-social"></i>
		                                </a>
		                            </li>
		                            <li>
		                                <a href="#">
		                                    <i class="flaticon-social-1"></i>
		                                </a>
		                            </li>
		                            <li>
		                                <a href="#">
		                                    <i class="flaticon-social-2"></i>
		                                </a>
		                            </li>
		                            <li>
		                                <a href="#">
		                                    <i class="flaticon-video"></i>
		                                </a>
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="col-md-2 col-sm-4 visible-sm">
		                    <div class="single-footer">
		                        <h2 class="footer-title">Shop</h2>
		                        <ul class="footer-list">
		                            <li><a href="#">Orders & Returns</a></li>
		                            <li><a href="#">Search Terms</a></li>
		                            <li><a href="#">Advance Search</a></li>
		                            <li><a href="#">Affiliates</a></li>
		                            <li><a href="#">Group Sales</a></li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="footer-bottom">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-6">
                            <div class="footer-bottom-left pull-left">
                                <p>Copyright &copy; 2021 <span><a href="https://freethemescloud.com/">Free themes Cloud</a></span>. All Right Reserved.</p>
                            </div>
		                </div>
		                <div class="col-md-6">
		                    <div class="footer-bottom-right pull-right">
		                        <img src="{{url('public/home')}}/img/paypal.png" alt="">
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</footer>
		<!-- Footer Area End -->
        <!--End of Quickview Product-->			
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="{{url('public/home')}}/js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
        <script src="{{url('public/home')}}/js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
        <script src="{{url('public/home')}}/js/owl.carousel.min.js"></script>
		<!-- jquery-ui js -->
        <script src="{{url('public/home')}}/js/jquery-ui.min.js"></script>
		<!-- jquery Counterup js -->
        <script src="{{url('public/home')}}/js/jquery.counterup.min.js"></script>
        <script src="{{url('public/home')}}/js/waypoints.min.js"></script>	
		<!-- jquery countdown js -->
        <script src="{{url('public/home')}}/js/jquery.countdown.min.js"></script>
		<!-- jquery countdown js -->
        <script type="text/javascript" src="{{url('public/home')}}/venobox/venobox.min.js"></script>
		<!-- jquery Meanmenu js -->
        <script src="{{url('public/home')}}/js/jquery.meanmenu.js"></script>
		<!-- wow js -->
        <script src="{{url('public/home')}}/js/wow.min.js"></script>	
		<script>
			new WOW().init();
		</script>
		<!-- scrollUp JS -->		
        <script src="{{url('public/home')}}/js/jquery.scrollUp.min.js"></script>
		<!-- plugins js -->
        <script src="{{url('public/home')}}/js/plugins.js"></script>
		<!-- Nivo slider js -->
		<script src="{{url('public/home')}}/lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<script src="{{url('public/home')}}/lib/home.js" type="text/javascript"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
		<!-- main js -->
        <script src="{{url('public/home')}}/js/main.js"></script>
        <script src="{{url('public/home')}}/toastr/toastr.js"></script>
		@yield('js')
        @if(Session::has('yes'))
            <script>
            toastr.success('{{Session::get('yes')}}','Success',{timeOut: 1500});
            </script>
        @endif
        @if(Session::has('no'))
            <script>
            toastr.error('{{Session::get('no')}}','Danger'),{timeOut: 1500};
            </script>
        @endif
    </body>
</html>