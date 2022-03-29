@extends('layouts.admin')
@section('title', 'Trashed Can Author')
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
                    <a href="{{route('author.create')}}" class="btn btn-success ml-3"><i class="fa fa-plus"></i>
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
                    <th>Author name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Tổng Sp</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($author as $at)
                <tr>
                    <td>{{$at->id}}</td>
                    <td>{{$at->name}}</td>
                    <td>{{$at->status==1 ? 'Hiện' : 'Ẩn'}}</td>
                    <td>{{$at->created_at->format('d-m-Y')}}</td>
                    <td>{{$at->prods()->count()}}</td>
                    <td>
                        <img src="{{url('public/uploads')}}/{{$at->image}}" alt="" width="60" height="70">
                    </td>
                    <td class="text-right">
                        <form class="form-inline" action="{{route('author.destroy',$at->id)}}" method="POST">
                        @csrf
                            <a href="{{route('author.restore', $at->id)}}" onclick="return confirm('Bạn muốn khôi phục sản phẩm không ?')" class="btn btn-sm btn-success"><i
                                class="fa fa-trash-restore"></i></a>
                            <a href="{{route('author.forcedelete', $at->id )}}" onclick="return confirm('Bạn muốn xóa sản phẩm không ?')"
                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center ml-4">
        {{$author->appends(request()->all())->links()}}
    </div>
    <hr>
    <a href="{{route('admin.index')}}" class="btn btn-danger ml-3 mb-2">
        <i class="fa fa-mail-reply"></i> Reset
    </a>
</section>
@stop()