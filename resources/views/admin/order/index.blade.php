@extends('layouts.admin')
@section('title', 'History Order')
@section('css')
<style>
.white {
    background-color: #fff;
}
</style>
@stop()
@section('main')
<section class="white">

    <div class="row">
        <div class="col-md-6 mt-4 mb-3">
            <div class="ml-5">
                <form class="form-inline" method="GET" action="" role="form">
                    <div class="form-group">
                        <input name="keyword" class="form-control" placeholder="Search ..."
                            aria-describedby="helpId" style="height:auto">
                    </div>
                    <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-search"></i></button>
                </form>
                @if($start && $end)
                <a href="?status=1&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-primary mt-3">Wait for confirmation</a>
                <a href="?status=2&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-warning mt-3">Confirmed</a>
                <a href="?status=3&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-danger mt-3">Delivery in progress</a>
                <a href="?status=4&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-success mt-3">Delivered</a>
                @else
                <a href="?status=1&keyword={{$key}}" class="btn btn-sm btn-primary mt-3">Wait for confirmation</a>
                <a href="?status=2&keyword={{$key}}" class="btn btn-sm btn-warning mt-3">Confirmed</a>
                <a href="?status=3&keyword={{$key}}" class="btn btn-sm btn-danger mt-3">Delivery in progress</a>
                <a href="?status=4&keyword={{$key}}" class="btn btn-sm btn-success mt-3">Delivered</a>
                @endif
            </div>
        </div>
        <div class="col-md-6 mt-4 mb-3">
            <form action="" role="form">
                <div class="form-group" style="float:left;">
                    <div class="input-group date" id="dateStart" data-target-input="nearest" style="width:200px">
                        <input type="text" name="dateStart" class="form-control datetimepicker-input"
                            data-target="#dateStart" style="height:auto;">
                        <div class="input-group-append" data-target="#dateStart" data-toggle="datetimepicker">
                            <div class="input-group-text" style="background: #e9ecef;color: #495057;"><i
                                    class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="float:left">
                    <div class="input-group date" id="dateEnd" data-target-input="nearest" style="width:200px">
                        <input type="text" name="dateEnd" class="form-control datetimepicker-input"
                            data-target="#dateEnd" style="height:auto;">
                        <div class="input-group-append" data-target="#dateEnd" data-toggle="datetimepicker">
                            <div class="input-group-text" style="background: #e9ecef;color: #495057;"><i
                                    class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="height:38px;">Submit</button>
            </form>
        </div>
    </div>
    <hr>
    <table class="table table table-sm table-bordered table-hover text-center" style="background: #fff;width:1200px;margin: 0 auto;">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Created At</th>
                <th>Total Price</th>
                <th class="text-center">Status</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Opptiom</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->created_at->format('d-m-Y')}}</td>
                <td>${{number_format($order->total_price)}}</td>
                <td>@if($order->status == 1)
                    <a href="#" class="btn btn-primary">Wait for confirmation</a>
                    @elseif($order->status == 2)
                    <a href="#" class="btn btn-warning">Confirmed</a>
                    @elseif($order->status == 3)
                    <a href="#" class="btn btn-danger">Delivery in progress</a>
                    @elseif($order->status == 4)
                    <a href="#" class="btn btn-success">Delivered</a>
                    @else
                    <a class="btn btn-danger">Cancelled</a>
                    @endif
                </td>
                <td>{{$order->cus->name}}</td>
                <td>{{$order->cus->phone}}</td>
                <td class="text-right">
                    <a href="{{route('admin.order.detail', $order->id)}}" class="btn btn-sm btn-primary">Details</a>
                    <a href="{{route('admin.order.pdf', $order->id)}}" target="_blank"
                        class="btn btn-sm btn-danger">PDF</a>
                    <a href="{{route('admin.order.pdf', $order->id)}}?action=download" target="_blank"
                        class="btn btn-sm btn-danger">Download PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="text-center">
        {{$orders->appends(request()->all())->links()}}
    </div>
</section>
@stop()
@section('css')
<link rel="stylesheet" href="{{url('public/admin')}}/assets/daterangepicker/daterangepicker.css">
@stop()
@section('js')
<script src="{{url('public/admin')}}/assets/moment/moment.min.js"></script>
<script src="{{url('public/admin')}}//assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<script>
// date picker
$('#dateStart').datetimepicker({
    format: 'YYYY-MM-DD'
});
$('#dateEnd').datetimepicker({
    format: 'YYYY-MM-DD'
});
</script>
@stop()