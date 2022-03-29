@extends('layouts.forgot_password')
@section('title','Send Email')
@section('main')
        <h1>Different Multiple Form Widget</h1>
		<div class="content">
			<div class="top-grids">
				<div class="top-grids-right">
					<div class="signin-form recover-password">
						<h3>Recover Password</h3>
						<form action="#" method="post">
							@csrf
							<input type="hidden" name="token" value="{{rand(1,10)}}">
							<input type="email" placeholder="Email" name="email" required="">
							<input type="submit" class="send" value="Submit Reset">
							<div class="signin-agileits-bottom"> 
								<p><a href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel and go back to Login page</a></p>    
							</div>
						</form>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
@stop()