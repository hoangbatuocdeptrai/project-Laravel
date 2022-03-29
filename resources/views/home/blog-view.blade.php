@extends('layouts.home')
@section('title', 'view blog')
@section('main')

<style>
    #img{
        width: 100%;
        height: 150px;
        margin-bottom: 10px;
    }

    .card{
        height: 300px;
    }
    .theP{
        color:red;
    }
    hr{
        background:red;
    }
    .a{
        margin-bottom: 10px;
    }
    
</style>
<br>
    <div class="text-center">
        <h2><b>View Blog Writer</b></h2>
    </div>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                        <h2>{{$blog->name}}</h2>
                        <p>{!!$blog->news!!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <h3 class="theP">Category</h3>
                <hr>
                @foreach($category as $ctg)
                <div class="list-group">
                    <a href="{{route('home.category',['id'=>$ctg->id, 'slug' => Str::slug($ctg->name)])}}" class="btn-sm list-group-item-action">{{$ctg->name}}</a>
                </div>
                @endforeach
                <h3 class="theP">Tags</h3>
                <hr>
                <ul class="tag-list">
                @foreach($author as $at)
                <a style="float:left;" href="{{route('home.info-author',['id'=>$ctg->id, 'slug' => Str::slug($at->name)])}}" class="a btn btn-sm">{{$at->name}}</a>
                @endforeach
                </ul>
                
            </div>
        </div>
    </div>


@stop()