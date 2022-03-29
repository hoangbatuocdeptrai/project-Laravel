@extends('layouts.login_admin')
@section('title', 'Login Admin')
@section('main')
                <div class="sap_tabs-w3agile">	
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						<div class="tab">
							<ul>
								<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Sign In</span></li>
								<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reset Password</span></li> 
							</ul>
						</div>
						<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
							<div class="login-top">
								<p>Sign In with social</p>
								<ul>
									<li><a class="face" href="https://www.facebook.com/w3layouts"><span class="face"> </span>Sign in with Facebook</a></li>
									<li><a class="twit" href="https://twitter.com/w3layouts"><span class="twit"> </span>Sign in with Twitter</a></li>
								</ul>
							</div>
								<h4 class="text-center">OR</h4>
							<div class="register">
								<form action="{{route('admin.check_login')}}" method="post">	
                                    @csrf
									<input placeholder="Email" name="email" class="user" type="email">
									<input placeholder="Password" name="password" class="pass" type="password">	
									<span><input type="checkbox" name="Remember">Remember Me</span>
									<div class="sign-up">
										<input type="submit" value="Sign In"/>
									</div>
								</form>
							</div>
						</div> 
						<div class="tab-3 resp-tab-content" aria-labelledby="tab_item-2">
							<p class="tab-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>

							<div class="register">
								<form action="{{route('admin.send_link')}}" method="post">	
                                    @csrf
                                    <input name="token" type="hidden" value="{{rand(1,10)}}">
									<input placeholder="Email" name="email" class="user" type="email" required="">
									<div class="sign-up">
										<input type="submit" value="Get New One !"/>
									</div>
								</form>
							</div>
						</div> 
					</div>	
					<div>
						<a href="{{route('home.index')}}">Back Home</a>
					</div>
				</div>
@stop()