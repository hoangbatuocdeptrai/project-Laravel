<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<link href="{{url('public/login_admin')}}/css/styles.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="{{url('public/login_admin')}}/toastr/toastr.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Tab Sign In Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'></head>
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<!--web-fonts-->
<script src="{{url('public/login_admin')}}/js/jquery.min.js"></script>
<script src="{{url('public/login_admin')}}/js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion           
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
				   </script>
<body>
		<!---header--->
		<div class="header">
			<h1>Tab Sign In Form</h1>
		</div>
		<!---header--->
		<!---main--->
			<div class="main-content-w3">
                    @yield('main')
			</div>
		<div class="footer-w3l">
			<p>&copy 2016 Tab Sign In Form . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>

		<!---main--->
		<script src="{{url('public/login_admin')}}/toastr/toastr.js"></script>
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