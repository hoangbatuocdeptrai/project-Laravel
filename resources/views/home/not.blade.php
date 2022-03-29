@extends('layouts.home')
@section('title', '404 Not Found')
@section('main')


<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					    <div class="breadcrumbs">
					       <h2>404 Page</h2> 
					       <ul class="breadcrumbs-list">
						        <li>
						            <a title="Return to Home" href="{{route('home.index')}}">Home</a>
						        </li>
						        <li>404 page</li>
						    </ul>
					    </div>
					</div>
				</div>
			</div>
		</div> 
		<!-- Breadcrumbs Area Start --> 
        <!-- 404 Error Page Start -->
        <div class="error-text-area section-padding">
			<img alt="" src="{{url('public/home')}}/img/404-page.jpg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="error-text text-center">
							<h1>OPPS! PAGE NOT FOUND</h1>
							<a href="{{route('home.index')}}">BACK TO HOME PAGE</a>
						</div>
					</div>
				</div>
			</div>
		</div>
       <!-- 404 Error Page End -->
    @stop()