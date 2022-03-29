@extends('layouts.home')
@section('title', 'About')
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
        <h2><b>Blog Writer</b></h2>
    </div>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @foreach($blog as $bl)
                        <div class="col-md-4">
                            <div class="card text-left">
                              <img class="card-img-top" src="{{url('public/upload')}}/{{$bl->image}}" id="img" alt="">
                              <div class="card-body">
                                <a href="{{route('home.blog-view',$bl->id)}}">
                                    <h4 class="card-title">{{Str::words("$bl->name", 11)}}</h4>
                                </a>
                        
                                <p class="card-text">{!!Str::words("$bl->name", 30)!!}</p>
                              </div>
                            </div>
                        </div>
                    @endforeach
                    
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