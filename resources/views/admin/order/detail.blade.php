@extends('layouts.admin')
@section('title', 'Details')
@section('css')
<style>
.white {
    background-color: #fff;
}

</style>
@stop()
@section('main')
<section class="white mb-4">
    <table class="table table table-sm table-bordered table-hover text-center"
        style="background: #fff;width: 800px;margin: 0 auto;">
        <thead>
            <h2 class="text-center pt-4"><b>Order Infomation</b></h2>
            <tr>
                <th style="width: 190px;">Id</th>
                <td class="text-center"><b>#{{$order->id}}</b></td>
            </tr>
            <tr>
                <th style="width: 190px;">Created At</th>
                <td class="text-center">
                    {{$order->created_at->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <th style="width: 190px;">Total Price</th>
                <td class="text-center">
                    ${{number_format($order->total_price)}}</td>
            </tr>
            <tr>
                <th style="width: 190px;padding-bottom:67px;">Status</th>
                <td class="text-center">
                    <form action="{{route('admin.order.status', $order->id)}}" method="POST" role="form"
                        style="margin: auto;">
                        @csrf
                        @if($order->status == 1)
                        <a href="#" class="btn btn-primary">Wait for confirmation</a>
                        @elseif($order->status == 2)
                        <a href="#" class="btn btn-warning">Confirmed</a>
                        @elseif($order->status == 3)
                        <a href="#" class="btn btn-danger">Delivery in progress</a>
                        @elseif($order->status == 4)
                        <a href="?status=3" class="btn btn-success">Delivered</a>
                        @else
                        <a class="btn btn-danger">Cancelled</a>
                        @endif

                        @if($order->status != 5)
                        <div class="form-group mt-1">
                            <select class="form-control" required="required" id="exampleFormControlSelect1"
                                name="status" width="100px">
                                <option>Select Status</option>
                                <option value="1">Wait for confirmation</option>
                                <option value="2">Confirmed</option>
                                <option value="3">Delivery in progress</option>
                                <option value="4">Delivered</option>
                                <option value="5">Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        @endif
                    </form>
                </td>
            </tr>
            <tr>
                <th style="width: 190px;">Payment Method</th>
                <td class="text-center">
                    {{$order->payment_method == 0 ? 'Cash on Delivery' : 'Via Paypal'}}</td>
            </tr>
        </thead>
    </table>
    <table class="table table table-sm table-bordered table-hover mt-4"
        style="background: #fff;width: 800px;margin: 0 auto;">
        <thead>
            <tr>
                <th width="50%" class="text-center">Orderer</th>
                <th class="text-center">Receiver</th>
            </tr>
            <tr>
                <td><b>Email:</b> {{$order->cus->email}}</td>
                <td><b>Email:</b> {{$order->email}}</td>
            </tr>
            <tr>
                <td><b>Phone:</b> {{$order->cus->phone}}</td>
                <td><b>Phone:</b> {{$order->phone}}</td>
            </tr>
            <tr>
                <td><b>Address:</b> {{$order->cus->address}}</td>
                <td><b>Address:</b> {{$order->address}}</td>
            </tr>
        </thead>
    </table>
    <table class="table table table-sm table-bordered table-hover text-center" style="background: #fff;width:1300px;margin: 0 auto;">
        <thead class="thead-dark">
            <h2 class="text-center" style="margin-top:40px;">Product Of Order</h2>
            <tr>
                <th>STT</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $n = 1;?>
            @foreach($order->details as $item)
            <tr>
                <td>{{$n}}</td>
                <td>{{$item->prod->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price * $item->quantity}}</td>
            </tr>
            <?php $n++;?>
            @endforeach
        </tbody>
    </table>
</section>
@stop()