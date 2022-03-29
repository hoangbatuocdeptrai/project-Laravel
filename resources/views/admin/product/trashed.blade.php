@extends('layouts.admin')
@section('title', 'Quản Lý Sản Phẩm')
@section('css')
<style>
.white {
    background-color: #fff;
}
</style>
@stop()
@section('main')
<section class="white">
    <div class="ml-3 mr-3 pt-4 pt3">


        <form class="form-inline" method="GET" action="" role="form">
            <div class="form-group">
                <input name="keyword" id="" class="form-control" placeholder="Nhập tên cần tìm ..."
                    aria-describedby="helpId">
            </div>
            <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-search"></i></button>
            <a href="{{route('product.create')}}" class="btn btn-success btn-xlg" type="button"><i
                    class="fa fa-plus"></i>Thêm
                mới</a>
        </form>
        <hr>
        <table class="table table table-sm table-bordered table-hover text-center" style="background: #fff;">
            <thead class="thead-dark">
                <tr>
                    <th style="width:30px;">Id</th>
                    <th>Tên SP</th>
                    <th>Giá SP</th>
                    <th>Giá KM</th>
                    <th>Trạng Thái</th>
                    <th>Author</th>
                    <th>Danh Mục</th>
                    <th>Hình Ảnh</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $model)
                <tr>
                    <td style="width:30px;">{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->price}}</td>
                    <td>{{$model->sale_price}}</td>
                    <td>
                        @if($model->status == 1)
                        <span>HOT!</span>
                        @elseif($model->status == 2)
                        <span>SALE!</span>
                        @else
                        <span>Sold Out!</span>
                        @endif
                    </td>
                    <td>{{$model->created_at->format('d-m-Y')}}</td>
                    <td>{{$model->cat->name}}</td>
                    <td>
                        <img src="{{url('public/uploads/'.$model->image)}}" alt="" width="60">
                    </td>
                    <td class="text-right">
                        
                            <a href="{{route('product.restore', $model->id)}}" onclick="return confirm('Bạn muốn khôi phục sản phẩm không ?')" class="btn btn-sm btn-success"><i
                                class="fa fa-trash-restore"></i></a>
                            <a href="{{route('product.forcedelete', $model->id )}}" onclick="return confirm('Bạn muốn xóa sản phẩm không ?')"
                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
               
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <div class="clear">
        {{$data->appends(request()->all())->links()}}
    </div>
</section>
@stop()