@extends('layouts.home')
@section('title', 'About')
@section('main')
		<!-- About Us Area Start -->
		<div class="about-us-area section-padding">
		    <div class="container">
                <div class="row">
                    <div class="about-top-inner">
                        <div class="col-md-6">
                            <div class="about-inner">
                                <div class="about-title">
                                    <h2>Our Story</h2>
                                </div>
                                <div class="about-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minim veniam, quis nostrud exerck itation ullam co laboris nisi ut aliquip ex ea commodo coes nsequat. Duis aute irure dolor in reprehenderit in.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minimLorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minim veniam, quis nostrud exerck itation ullam co laboris nisi ut aliquip ex ea commodo coes nsequat. Duis aute irure dolor in reprehenderit in. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-image">
                                <img src="{{url('public/home')}}/img/about/1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="about-bottom-inner">
                        <div class="col-md-6">
                            <div class="about-image">
                                <img src="{{url('public/home')}}/img/about/2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-inner">
                                <div class="about-title">
                                    <h2>Mission and Vission</h2>
                                </div>
                                <div class="about-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minim veniam, quis nostrud exerck itation ullam co laboris nisi ut aliquip ex ea commodo coes nsequat. Duis aute irure dolor in reprehenderit in.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minimLorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
		</div>
		<!-- About Us Area End -->
		<!-- Our Team Area Start -->
		<div class="our-team-area">
		    <h2 class="section-title">OUR WRITER</h2>
		    <div class="container">
		        <div class="row">
		        <div class="team-list indicator-style">
					@foreach($cats as $item)
						<div class="col-md-3">
							<div class="single-team-member">
								<a href="#">
									<img src="{{url('public/home')}}/img/about/team/1.jpg" alt="">
								</a>
								<div class="member-info">
								<a href="#">{{$item->name}}</a>
									<p>WRITER</p>
								</div>
							</div>
						</div>
					@endforeach
		        </div>
		        </div>
		    </div>
		</div>
@stop()