@extends('layouts.admin')
@section('title', 'Author')
@section('css')
<style>
.white {
    background-color: #fff;
}
.pri {
    color: #28a745;
}
.sli{
    color: silver;
}
</style>
@stop()
@section('main')
<section class="white">
    <div class="row">
        <div class="col-md-4 ml-3 mt-4 mb-3">
            <form action="" method="GET" action="" role="form">
                <div class="input-group">
                <input type="text" id="input1-group2" name="keyword" placeholder="Search ..." class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
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
                    <th>Gross Product</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($author as $at)
                <tr>
                    <td>{{$at->id}}</td>
                    <td>{{$at->name}}</td>
                    <td>@if($at->status==1)
                        <i class="fa fa-circle pri"></i>
                        @else
                        <i class="fa fa-circle sli"></i>
                        @endif</td>
                    <td>{{$at->created_at->format('d-m-Y')}}</td>
                    <td>{{$at->prods()->count()}}</td>
                    <td>
                        <img src="{{url('public/uploads')}}/{{$at->image}}" alt="" width="60" height="70">
                    </td>
                    <td class="text-right">
                        <form class="form-inline" action="{{route('author.destroy',$at->id)}}" method="POST">
                        @csrf
                            <a href="{{route('author.edit', $at->id)}}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <button onclick="return confirm('Bạn muốn xóa sản phẩm không ?')"
                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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