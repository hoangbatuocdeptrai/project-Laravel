@extends('layouts.admin')
@section('title', 'Borrower')
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
            </div>
            <div class="ml-5">
            @if($start && $end)
            <a href="?status=0&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-dark mt-3">All</a>
                <a href="?status=1&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-primary mt-3">Wait for confirmation</a>
                <a href="?status=2&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-warning mt-3">Confirmed</a>
                <a href="?status=3&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-success mt-3">Paid</a>
                @else
                <a href="?status=0&keyword={{$key}}&dateStart={{$start}}&dateEnd={{$end}}"
                    class="btn btn-sm btn-dark mt-3">All</a>
                <a href="?status=1&keyword={{$key}}" class="btn btn-sm btn-primary mt-3">Wait for confirmation</a>
                <a href="?status=2&keyword={{$key}}" class="btn btn-sm btn-warning mt-3">Wait for pay</a>
                <a href="?status=3&keyword={{$key}}" class="btn btn-sm btn-success mt-3">Paid</a>
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
    <table class="table table table-sm table-bordered table-hover text-center"
        style="background: #fff;width:1200px;margin: 0 auto;">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Borrowing code</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Total Price</th>
                <th class="text-center">Payment</th>
                <th>Opptiom</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrower as $bor)
            <tr>
                <td>{{$bor->id}}</td>
                <td>{{$bor->token}}</td>
                <td>{{$bor->name}}</td>
                <td>{{$bor->created_at->format('d-m-Y')}}</td>
                @if($bor->status == 1)
                <td>Need confirmation</td>
                @elseif($bor->status == 2)
                <td>{{number_format($bor->total_price)}}</td>
                @elseif($bor->status == 3)
                <td>Null</td>
                @else
                <td>Unpaid</td>
               
                @endif
                <td>@if($bor->status == 0)
                    <a href="#" onclick="alert('Người dùng chưa xác nhận trả sách !')" class="btn btn-danger">Return has not been confirmed</a>
                    @elseif($bor->status == 1)
                    <form action="{{route('admin.borrower.status',$bor->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="2">
                        <button onclick="return confirm('Bạn đã kiểm tra sách và muốn cho phép khách hàng thanh toán chứ ?')" type="submit" class="btn btn-primary">Wait for confirmation</button>
                    </form>
                    @elseif($bor->status == 2)
                    <a href="#" onclick="alert('Đang chờ người dùng thanh toán !')"class="btn btn-warning">Wait for pay</a>
                    @elseif($bor->status == 3)
                    <a href="#" class="btn btn-success">Paid</a>
                    @else
                    @endif
                </td>
                <td class="text-right">
                    <a href="{{route('admin.borrower.detail', $bor->token)}}" class="btn btn-sm btn-primary">Details</a>
                    <a href="{{route('admin.borrower.pdf', $bor->id)}}" target="_blank" class="btn btn-sm btn-danger">PDF</a>
                    <a href="{{route('admin.borrower.pdf', $bor->id)}}?action=download" target="_blank"
                        class="btn btn-sm btn-danger">Download PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="text-center">
        {{$borrower->appends(request()->all())->links()}}
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