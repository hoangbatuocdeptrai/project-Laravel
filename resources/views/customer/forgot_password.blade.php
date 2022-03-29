@extends('layouts.forgot_password')
@section('title','Forgot Password')
@section('main')
        <h1>Different Multiple Form Widget</h1>
		<div class="content">
			<div class="top-grids">
				<div class="top-grids-right">
                <div class="signin-form reset-password">
						<h3>Reset Password</h3>
						<form action="{{route('customer.password_new')}}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{$customer->token}}">
							<input type="password" placeholder="Password" name="password" required="">
							<input type="password" placeholder="Repeat Password" name="confirm_password" required="">
							<input type="submit" class="send" value="Update Password">
						</form>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
@stop()