@extends('layouts.admin')
@section('title', 'Trashed Can')
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
        <div class="col-md-4 ml-3 mt-4 mb-3">
            <form action="" method="GET" action="" role="form">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                    <input type="text" id="input1-group2" name="keyword" placeholder="Username" class="form-control">
                    <a href="{{route('category.create')}}" class="btn btn-success ml-3"><i class="fa fa-plus"></i>
                        ADD</a>
                </div>
            </form>
        </div>
    </div>
    <div class="ml-3 mr-3">
        <table class="table table table-sm table-bordered table-hover text-center" style="background: #fff;">
            <thead class="thead-dark">
                <tr>
                    <th style="width:30px;">Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Gross Product</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cats as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>@if($cat->status==1)
                        <i class="fa fa-circle pri"></i>
                        @else
                        <i class="fa fa-circle sli"></i>
                        @endif</td>
                    <td>{{$cat->created_at->format('d-m-Y')}}</td>
                    <td>{{$cat->prods()->count()}}</td>
                    <td class="text-right">
                            <a href="{{route('category.restore', $cat->id)}}" onclick="return confirm('Bạn muốn khôi phục sản phẩm không ?')" class="btn btn-sm btn-primary"><i
                                    class="fa fa-trash-restore"></i></a>
                            <a href="{{route('category.forcedelete', $cat->id)}}" onclick="return confirm('Bạn muốn xóa sản phẩm không ?')"
                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center ml-4">
        {{$cats->appends(request()->all())->links()}}
    </div>
    <hr>
    <a href="{{route('admin.index')}}" class="btn btn-danger ml-3 mb-2">
        <i class="fa fa-mail-reply"></i> Reset
    </a>
</section>
@stop()