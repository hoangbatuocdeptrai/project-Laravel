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
        style="background: #fff;width: 700px;margin: 0 auto;">
        <thead>
            <form action="{{route('admin.borrower.add-price',$borrower->id)}}" method="GET">
                @csrf
                <h2 class="text-center pt-4"><b>Borrower Infomation</b></h2>
                <tr>
                    <th style="width: 190px;">Id</th>
                    <td class="text-center"><b>#{{$borrower->token}}</b></td>
                </tr>
                <tr>
                    <th style="width: 190px;">Created At</th>
                    <td class="text-center">
                        {{$borrower->created_at->format('d-m-Y')}}</td>
                </tr>
                <tr>
                    <th style="width: 190px;">
                        Total Price
                        <p><i>(Default price)</i></p>
                    </th>
                    <td class="text-center">
                        ${{number_format($borrower->total_price)}}</td>
                </tr>
                <tr>
                    <th style="width: 190px;" class="pb-4">
                        Maintenance cost
                    </th>
                    <td class="text-center" style="margin: 0 auto;">
                        <div class="form-group">
                            $
                            <input type="text" name="total_price" class="mt-3 col-3" value="{{$borrower->total_price}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th style="width: 190px;padding-bottom:67px;">Book Test Results</th>
                    <td>
                        <div class="form-group">
                            <textarea placeholder="Text" class="form-control" name="content" id="" rows="3">{{$borrower->content}}</textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button type="submit" class="btn btn-primary start">
                            <i class="fas fa-upload"></i>
                            <span>Update</span>
                        </button>
                    </td>
                </tr>
            </form>
        </thead>
    </table>
    <table class="table table table-sm table-bordered table-hover mt-4"
        style="background: #fff;width: 500px;margin: 0 auto;">
        <thead>
            <tr>
                <th class="text-center">Receiver</th>
            </tr>
            <tr>
                <td><b>Email:</b> {{$borrower->email}}</td>
            </tr>
            <tr>
                <td><b>Phone:</b> {{$borrower->phone}}</td>
            </tr>
            <tr>
                <td><b>Address:</b> {{$borrower->address}}</td>
            </tr>
        </thead>
    </table>
    <table class="table table table-sm table-bordered table-hover text-center"
        style="background: #fff;width:1300px;margin: 0 auto;">
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
            @foreach($borrower->details as $item)
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