@extends('layouts.home')
@section('title', 'Login')
@section('main')
@foreach($ban as $bn)
<div class="breadcrumbs-area" style="background-image: url('{{url('public/uploads')}}/{{$bn->img_account}}');background-size: 100% 345px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>LOGIN/REGISTER</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Breadcrumbs Area Start -->
<!-- Loging Area Start -->
<div class="login-account section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <form action="{{route('customer.create_login')}}" class="create-account-form" method="post">
                    @csrf
                    <h2 class="heading-title">
                        CREATE AN ACCOUNT
                    </h2>
                    <p class="form-row">
                        <input type="text" name="name" placeholder="Name address">
                        @error('name')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </p>
                    <p class="form-row">
                        <input type="email" name="email" placeholder="Email address">
                        @error('email')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </p>
                    <p class="form-row">
                        <input type="password" name="password" placeholder="Password address">
                        @error('password')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </p>
                    <p class="form-row">
                        <input type="password" name="confirm_password" placeholder="Confirm Password address">
                        @error('confirm_password')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </p>
                    <p class="form-row">
                        <input type="text" name="phone" placeholder="Phone address">
                        @error('phone')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </p>
                    <p class="form-row">
                        <input type="text" name="address" placeholder="Address address">
                        @error('address')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </p>
                    <p class="form-row">
                    <div class="form-check">
                        <h3>Gender</h3>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="" value="1">
                            Nam
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="" value="2">
                            Nữ
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="" value="3">
                            Khác
                        </label>
                    </div>
                    @error('gender')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                    </p>
                    <div class="submit">
                        <button id="submitcreate" type="submit" class="btn-default">
                            <span>
                                <i class="fa fa-user left"></i>
                                Create an account
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-sm-6">
                <form action="{{route('customer.post_login')}}" class="create-account-form" method="post">
                    @csrf
                    <h2 class="heading-title">
                        ALREADY RESIGTERED?
                    </h2>
                    <p class="form-row">
                        <input type="email" name="email" placeholder="Email address">
                    </p>
                    <p class="form-row">
                        <input type="password" name="password" placeholder="Password">
                    </p>
                    <p class="lost-password form-group">
                        <a href="{{route('customer.send_email')}}">Forgot your password?</a>
                    </p>
                    <div class="submit">
                        <button id="submitcreate" type="submit" class="btn-default">
                            <span>
                                <i class="fa fa-user left"></i>
                                SING IN
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Loging Area End -->
@stop()