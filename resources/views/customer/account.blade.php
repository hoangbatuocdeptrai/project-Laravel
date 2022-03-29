@extends('layouts.home')
@section('title', 'My Account')
@section('main')
@foreach($ban as $bn)
<div class="breadcrumbs-area" style="background-image: url('{{url('public/uploads')}}/{{$bn->img_account}}');background-size: 100% 345px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>My Account</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="index.html">Home</a>
                        </li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Breadcrumbs Area Start -->
<!-- My Account Area Start -->
<div class="my-account-area section-padding">
    <div class="container">
        <div class="section-title2">
            <h2>Procced to Checkout</h2>
            <p>Welcome to your account. Here you can manage all of your personal information and orders.</p>
        </div>
        <div class="row">
            <div class="addresses-lists">
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-building"></i>
                                        <span>My first address</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="coupon-info">
                                        <h1 class="heading-title">Your addresses </h1>
                                        <p class="coupon-text">To add a new address, please fill out the form below.</p>
                                        <p class="required">*Required field</p>
                                        <form action="#">
                                            <div class="text-center mb-4">
                                                @if($customer->image)
                                                <img src="{{url('public/uploads')}}/{{$customer->image}}" alt="" width="200px" height="200px">
                                                @else
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSegCgK5aWTTuv_K5TPd10DcJxphcBTBct6R170EamgcCOcYs7LGKVy7ybRc-MCwOcHljg&usqp=CAU"
                                                    alt="" style="width:200px;height:200px;">
                                                @endif
                                                <h4>Name: {{$customer->name}}</h4>
                                                <h4>Address: {{$customer->address}}</h4>
                                                <h4>Phone: {{$customer->phone}}</h4>
                                                <h4>Gender: {{$customer->gender == 1 ? 'Nam' : 'Nữ'}}</h4>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-list-ol"></i>
                                        <span>My credit slips</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div class="coupon-info">
                                        <h1 class="heading-title">Order history </h1>
                                        <p class="coupon-text">Here are the orders you've placed since your account was
                                            created.</p>
                                        <div class="order-history">
                                            <p class="alert">You have not placed any orders.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-file-o"></i>
                                        <span>My addresses</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <div class="coupon-info">
                                        <h1 class="heading-title">Order history </h1>
                                        <p class="coupon-text">Here are the orders you've placed since your account was
                                            created.</p>
                                        <div class="order-history">
                                            <p class="alert">You have not placed any orders.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fa fa-building"></i>
                                        <span>My personal information</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <div class="coupon-info">
                                        <h1 class="heading-title">Edit addresses </h1>
                                        <p class="coupon-text">To edit a new address, please fill out the form below.
                                        </p>
                                        <p class="required">*Required field</p>
                                        <form action="{{route('customer.edit_account')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="text-center">
                                                <input type="file" name="upload" class="form-control upload"
                                                    style="display: none;">
                                                @if($customer->image)
                                                <img id="show_thumb" src="{{url('public/uploads')}}/{{$customer->image}}" alt="" style="width:200px;height:200px;cursor: pointer;">
                                                @else
                                                <img id="show_thumb"
                                                    src="https://png.pngtree.com/png-vector/20190307/ourlarge/pngtree-vector-add-user-icon-png-image_762930.jpg"
                                                    alt="" width="200px" height="200px">
                                                @endif
                                            </div>
                                            <h4>Name</h4>
                                            <p class="form-row">
                                                <input type="text" name="name" value="{{$customer->name}}">
                                            </p>
                                            @error('name')
                                            <small style="color:red">{{$message}}</small>
                                            @enderror
                                            <h4>Address</h4>
                                            <p class="form-row">
                                                <input type="text" name="address" value="{{$customer->address}}">
                                            </p>
                                            @error('address')
                                            <small style="color:red">{{$message}}</small>
                                            @enderror
                                            <h4>Phone</h4>
                                            <p class="form-row">
                                                <input type="text" name="phone" value="{{$customer->phone}}" />
                                            </p>
                                            @error('phone')
                                            <small style="color:red">{{$message}}</small>
                                            @enderror
                                            <h4>Gender</h4>
                                            <p class="form-row">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input"
                                                        name="gender" id="" value="1"
                                                        {{$customer->gender == 1 ? 'checked' : ''}}>
                                                    Nam
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input"
                                                        name="gender" id="" value="2"
                                                        {{$customer->gender == 2 ? 'checked' : ''}}>
                                                    Nữ
                                                </label>
                                            </p>
                                            @error('gender')
                                            <small style="color:red">{{$message}}</small>
                                            @enderror
                                            <h5 style="color:green">You want to change your password?</h5>
                                            <h4>Password new</h4>
                                            <p class="form-row">
                                                <input type="password" name="password" value=""
                                                    placeholder="Password new *" />
                                            </p>
                                            @error('password')
                                            <small style="color:red">{{$message}}</small>
                                            @enderror
                                            <h4>Confirm Password</h4>
                                            <p class="form-row">
                                                <input type="password" name="confirm_password" value=""
                                                    placeholder="Confirm Password *" />
                                            </p>
                                            @error('confirm_password')
                                            <small style="color:red">{{$message}}</small>
                                            @enderror
                                            <div class="submit">
                                                <button type="submit" class="btn-default">
                                                    <span>
                                                        <i class="fa fa-user left"></i>
                                                        Save account
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="myaccount-link-list">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="{{route('favorite.view')}}">
                                        <i class="fa fa-heart"></i>
                                        <span>My wishlists({{count($favorite)}})</span>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <i class="fa fa-list-ol"></i>
                                        <span>Order history and details</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingFive">
                                <div class="panel-body">
                                    <div class="coupon-info">
                                        <table class="table table table-sm table-bordered table-hover text-center"
                                            style="background: #fff;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                    <th>Total Price</th>
                                                    <th>Payment</th>
                                                    <th>Status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{date_format($item->created_at,'d/m/Y')}}</td>
                                                    <td>${{$item->total_price}}</td>
                                                    <td>
                                                        {{$item->payment == 1 ? 'Banking' : 'Tiền mặt'}}
                                                    </td>
                                                    <td class="text-right"
                                                        style="color:{{$item->status == 2 ? 'green' : 'red'}}">
                                                        {{$item->status == 1 ? 'Success' : 'Loading...'}}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('customer.detail',$item->id)}}?action=detail"
                                                            class="settings" data-toggle="tooltip">Detail</a>
                                                        <a href="{{route('customer.detail',$item->id)}}?action=download"
                                                            class="delete" data-toggle="tooltip">PDF</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            {{$orders->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <i class="fa fa-list-ol"></i>
                                        <span>Borrower history and details</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingSix">
                                <div class="panel-body">
                                    <div class="coupon-info">
                                        <table class="table table table-sm table-bordered table-hover text-center"
                                            style="background: #fff;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Start</th>
                                                    <th>Quantity</th>
                                                    <th>Payment</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($borrower as $item)
                                                <tr>
                                                    <td>{{$item->token}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{date_format($item->created_at,'d/m/Y')}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>
                                                        @if($item->status == 0)
                                                        <form action="{{route('borrower.check_cus',$item->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="1">
                                                            <button type="submit" class="btn btn-primary">Trả
                                                                sách</button>
                                                        </form>
                                                        @elseif($item->status == 1)
                                                        <button type="submit" class="btn btn-warning">Chờ xác
                                                            nhận</button>
                                                        @elseif($item->status == 2)
                                                        <form action="{{route('borrower.check_code')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="token" value="{{$item->token}}">
                                                            <button class="btn btn-success">Thanh Toán</button>
                                                        </form>
                                                        @else
                                                        <button class="btn btn-danger">Đã thanh toán</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('customer.detail_borrower',$item->id)}}?action=detail"
                                                            class="settings" data-toggle="tooltip">Detail</a>
                                                        <a href="{{route('customer.detail_borrower',$item->id)}}?action=download"
                                                            class="delete" data-toggle="tooltip">PDF</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            {{$borrower->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="create-account-button pull-left">
                    <a href="{{route('home.index')}}" class="btn button button-small" title="Home">
                        <span>
                            <i class="fa fa-chevron-left"></i>
                            Home
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Area End -->
@stop()
@section('js')
<script>
$(document).ready(function() {
    $('#show_thumb').click(function() {
        $('.upload').click();
    });
    $('.upload').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                $('#show_thumb').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    })
});
</script>
@stop()