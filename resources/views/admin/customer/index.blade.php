@extends('layouts.admin')
@section('title', 'Customer Management')
@section('css')
<style>
.white {
    background-color: #fff;
}

.pri {
    color: blue;
}

.red {
    color: red;
}
</style>
@stop()
@section('main')
<section class="white">
    <div class="ml-3 mr-3 pt-4 pt3">


        <form class="form-inline" method="GET" action="" role="form">
            <div class="form-group">
                <input name="keyword" id="" class="form-control" placeholder="Enter name ..." aria-describedby="helpId">
            </div>
            <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-search"></i></button>
        </form>
        <hr>
        <table class="table table table-sm table-bordered table-hover text-center" style="background: #fff;">
            <thead class="thead-dark">
                <tr>
                    <th style="width:30px;">Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Orders</th>
                    <th>Borrowers</th>
                    <th>Wishlist</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $cus)
                <tr>
                    <td style="width:30px;">{{$cus->id}}</td>
                    <td>{{$cus->name}}</td>
                    <td>
                        @if($cus->image)
                        <img src="{{url('public/uploads/'.$cus->image)}}" alt="" width="60">
                        @else
                        <img src="https://tinchinhchu.net/Content/img/bdsv-user-avatar.jpg" alt="" width="60">
                        @endif
                    </td>
                    <td>{{$cus->email}}</td>
                    <td>{{$cus->phone}}</td>
                    <td>{{$cus->orders()->count()}}
                        <span><i class="fa fa-truck pri"></i></span>
                    </td>
                    <td>{{$cus->borrowers()->count()}}
                        <span><i class="fa fa-scroll"></i></span>
                    </td>
                    <td>{{$cus->favorite()->count()}}
                        <span><i class="fa fa-heart red"></i></span>
                    </td>
                    <td>
                        <form action="{{route('customer.destroy', $cus->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete the customer ?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <div class="clear">
        {{$customer->appends(request()->all())->links()}}
    </div>
</section>
@stop()