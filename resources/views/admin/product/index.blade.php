@extends('layouts.admin')
@section('title', 'Product Management')
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
                <input name="keyword" id="" class="form-control" placeholder="Search ..." aria-describedby="helpId">
            </div>
            <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-search"></i></button>
            <a href="{{route('product.create')}}" class="btn btn-success btn-xlg" type="button"><i
                    class="fa fa-plus"></i> Add new</a>
        </form>
        <hr>
        <table class="table table table-sm table-bordered table-hover text-center" style="background: #fff;">
            <thead class="thead-dark">
                <tr>
                    <th style="width:30px;">Id</th>
                    <th>Product's name</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Overall rating</th>
                    <th>Create At</th>
                    <th>Category</th>
                    <th>Image</th>
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
                    <td>{!!$model->rat->avg('rating_start') ? $model->rat->avg('rating_start').'<i style="color:blue;" class="fa fa-star"></i>' : 'Null'!!}</td>
                    <td>{{$model->created_at->format('d-m-Y')}}</td>
                    <td>{{$model->cat->name}}</td>
                    <td>
                        <img src="{{url('public/uploads/'.$model->image)}}" alt="" width="60">
                    </td>
                    <td class="text-right">
                        <form class="form-inline" action="{{route('product.destroy', $model->id)}}" method="POST">
                            @csrf
                            <a href="{{route('product.edit', $model->id)}}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <button onclick="return confirm('Do you want to delete the product?')"
                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                </script>
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