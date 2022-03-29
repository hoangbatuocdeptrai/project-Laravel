@extends('layouts.home')
@section('title', 'Contact')
@section('main')
<div class="container">
    <div style="width:100%;height:445px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657600813901!2d105.78126221476359!3d21.046381985988802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1625564435666!5m2!1svi!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!-- Map Area End -->
<!-- Address Information Area Start -->
<div class="address-info-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm">
                <div class="address-single">
                    <div class="all-adress-info">
                        <div class="icon">
                            <span><i class="fa fa-user-plus"></i></span>
                        </div>
                        <div class="info">
                            <h3>PHONE</h3>
                            <p>+(02)-12345-6789-55</p>
                            <p>+(05)-15689-5698-44</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="address-single">
                    <div class="all-adress-info">
                        <div class="icon">
                            <span><i class="fa fa-map-marker"></i></span>
                        </div>
                        <div class="info">
                            <h3>ADDRESS</h3>
                            <p>Mhilara Street 205,</p>
                            <p>Roitan city, USA.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="address-single no-margin">
                    <div class="all-adress-info">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="info">
                            <h3>E-MAIL</h3>
                            <p>info123@gmail.com</p>
                            <p>www.companyweb.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Address Information Area End -->
<!-- Contact Form Area Start -->
<div class="contact-form-area">
    <div class="container">
        <div class="about-title">
            <h3>LEAVE A MESSAGE</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('home.add-contact')}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="contact-form-left">
                                @if(auth()->guard('kh')->check())
                                <input type="hidden" name="customer_id" value="{{Auth::guard('kh')->user()->id}}" />
                                <input type="text" name="name" placeholder="Your Name" value="{{Auth::guard('kh')->user()->name}}"/>
                                <input type="email" name="email" placeholder="Your Email" value="{{Auth::guard('kh')->user()->email}}"/>
                                <input type="text" name="phone" placeholder="Your phone" value="{{Auth::guard('kh')->user()->phone}}"/>
                                @else
                                <input type="text" name="name" placeholder="Your Name" />
                                <input type="email" name="email" placeholder="Your Email" />
                                <input type="text" name="phone" placeholder="Your phone" />
                                @endif
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="contact-form-right">
                                <div class="input-message">
                                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                    @if(auth()->guard('kh')->check())
                                    <input class="btn btn-default" type="submit" value="SEND" name="submit" id="submit">
                                    @else
                                    <a href="{{route('customer.login')}}" class="btn btn-default" value="SEND"
                                        id="submit">SEND</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact Form Area End -->
@stop()