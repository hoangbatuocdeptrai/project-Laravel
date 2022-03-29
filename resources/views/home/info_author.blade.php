@extends('layouts.home')
@section('title', 'About')
@section('main')
<!-- About Us Area Start -->
<div class="about-us-area section-padding">
    <div class="container">
        <div class="row">
            <div class="about-top-inner">
                <div class="col-md-8">
                    <div class="about-inner">
                        <div class="about-title">
                            <h2>{{$author->name}}</h2>
                        </div>
                        <img src="{{url('public/uploads')}}/{{$author->image}}" alt="" width="750" height="400">
                        <div class="about-content" style="margin-top: 10px;">
                            {!!$author->description!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="about-image">
                        <img src="https://lh3.googleusercontent.com/proxy/rXq0YevEujD1VBpCia7Nk_XJAr72fyGV_-M2yS-VuCuoFZH5f5Q_931F6Jhvv2RBHQGNbqBrQOXV0r3_iiMpFaa1lHoahxvJmwOpYG12lTJvsD5bcVixd861RIBD8cysxqnwVwanOWZtJBs0u5cKp4Do2wcXDeHQBl_Oq5ZWY4UuIwVJyHJTVDA0QWeF1W8k2ZF7m7Avdd7ur0sgGx0WUko"
                            alt="" width="100%">
                    </div>
                    <div class="about-title">
                        <h4 style="color: #32b5f3;margin-top:20px;"><i>Some other authors:</i></h4>
                        @foreach($authors as $aut)
                        <div class="card">
                            <img class="card-img-top" src="{{url('public/uploads')}}/{{$aut->image}}"
                                alt="Card image cap" height="180px">
                            <div class="card-body">
                                <a href="{{route('home.info-author',$aut->id)}}">
                                    <h4 class="card-title" style="margin:10px 0 0 10px;">{{$aut->name}}</h4>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Area End -->
<div class="our-team-area">
    <h2 class="section-title">OUR WRITER</h2>
    <div class="container">
        <div class="row">
            <div class="team-list indicator-style">
                @foreach($author->prods as $pro)
                <div class="col-md-3">
                    <div class="single-team-member">
                        <a href="#">
                            <img src="{{url('public/uploads')}}/{{$pro->image}}" alt="">
                        </a>
                        <div class="member-info">
                            <a href="#">{{$pro->name}}</a>
                            <p>{{$author->name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach;

            </div>
        </div>
    </div>
</div>
@stop()