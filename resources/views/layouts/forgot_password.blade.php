<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Different Multiple Form Widget Flat Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Different Multiple Form Widget template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{url('public/forgot')}}/css/styles.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="{{url('public/forgot')}}/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //web font -->
<link rel="stylesheet" href="{{url('public/forgot')}}/toastr/toastr.css">
</head>
<body>
	<!-- main -->
	<div class="main-agile">
        @yield('main')
	</div>	
	<!-- //main --> 
	<script src="{{url('public/forgot')}}/toastr/toastr.js"></script>
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