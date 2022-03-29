@extends('layouts.home')
@section('title', 'Pay')
@section('css')
<style>
section {
    margin: 0;
    padding: 0
}

.cc-m {
    height: 100%
}

.cc-n {
    background-color: #fff
}

.card0 {
    margin: 40px 12px 15px 12px;
    border: 0
}

.card1 {
    margin: 0;
    padding: 15px;
    padding-top: 25px;
    padding-bottom: 0px;
    background: #263238;
    height: 100%
}

.bill-head {
    color: #ffffff;
    font-weight: bold;
    margin-bottom: 0px;
    margin-top: 0px;
    font-size: 30px
}

.line {
    border-right: 1px grey solid
}

.bill-date {
    color: #BDBDBD
}

.red-bg {
    margin-top: 25px;
    margin-left: 0px;
    margin-right: 0px;
    background-color: #F44336;
    padding-left: 20px !important;
    padding: 25px 10px 25px 15px
}

#total {
    margin-top: 0px;
    padding-left: 7px
}

#total-label {
    margin-bottom: 0px;
    color: #ffffff;
    padding-left: 7px
}

#heading1 {
    color: #ffffff;
    font-size: 20px;
    padding-left: 10px
}

#heading2 {
    font-size: 27px;
    color: #D50000
}

.placeicon {
    font-family: fontawesome !important
}

.card2 {
    padding: 25px;
    margin: 0;
    height: 100%
}

.form-card .pay {
    font-weight: bold
}

.form-card input,
.form-card textarea {
    padding: 10px 8px 10px 8px;
    border: none;
    border: 1px solid lightgrey;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

.form-card input:focus,
.form-card textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border: 1px solid gray;
    outline-width: 0
}

.btn-info {
    color: #ffffff !important
}

.radio-group {
    position: relative;
    margin-bottom: 25px
}

.radio {
    display: inline-block;
    width: 204;
    height: 64;
    border-radius: 0;
    background: lightblue;
    box-sizing: border-box;
    border: 2px solid lightgrey;
    cursor: pointer;
    margin: 8px 25px 8px 0px
}

.radio:hover {
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.2)
}

.radio.selected {
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.4)
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>
@stop()
@section('main')
<section>
    <div class="cc-m">
        <div class="cc-n">
            <div class="container" style="margin: 0 auto;">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-11">
                        <div class="card card0 rounded-0">
                            <div class="row">
                                <div class="col-md-5 d-md-block d-none p-0 box">
                                    <div class="card rounded-0 border-0 card1" id="bill">
                                        <h3 id="heading1">Payment Summary</h3>
                                        <div class="row">
                                            <div class="col-lg-6 col-8 mt-4 line pl-4">
                                                <h2 class="bill-head">Amount</h2> <small class="bill-date">2017 Feb
                                                    10 at
                                                    10:30 PM</small>
                                            </div>
                                            <div class="col-lg-6 col-4 mt-4">
                                                <h2 class="bill-head px-xl-5 px-lg-4">{{$borrower->quantity}}</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-8 mt-4 line pl-4">
                                                <h2 class="bill-head">Created At</h2> <small class="bill-date">2017 Feb
                                                    25 at
                                                    11:30
                                                    PM</small>
                                            </div>
                                            <div class="col-lg-6 col-4 mt-4">
                                                <h2 class="bill-head px-xl-5 px-lg-4">
                                                    {{$borrower->created_at->format('Y-m-d')}}</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-8 mt-4 line pl-4">
                                                <h2 class="bill-head">Price per book</h2> <small class="bill-date">(1
                                                    day
                                                    loan 2 dollars)
                                                </small>
                                            </div>
                                            <div class="col-lg-6 col-4 mt-4">
                                                <h2 class="bill-head px-xl-5 px-lg-4">{{$price}}</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-8 mt-4 line pl-4">
                                                <h2 class="bill-head text-center">Book status</h2>
                                                <p style="font-size:15px;color:red;"><i>{{$borrower->content ? $borrower->content : 'Intact'}}</i></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 red-bg">
                                                <p class="bill-date" id="total-label">Total Price</p>
                                                <h2 class="bill-head" id="total">$ {{$borrower->total_price}}</h2> <small
                                                    class="bill-date" id="total-label">Price includes all taxes</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 p-0 box">
                                    <div class="card rounded-0 border-0 card2" id="paypage">
                                        <div class="form-card">
                                            <h2 id="heading2" class="text-danger">Payment Method</h2>
                                            <div class="radio-group">
                                                <div class='radio' data-value="credit"><img
                                                        src="https://i.imgur.com/28akQFX.jpg" width="200px"
                                                        height="60px"></div>
                                                <div class='radio' data-value="paypal"><img
                                                        src="https://i.imgur.com/5QFsx7K.jpg" width="200px"
                                                        height="60px"></div>
                                                <br>
                                            </div> <label class="pay">Name on Card</label> <input type="text"
                                                name="holdername" placeholder="John Smith">
                                            <div class="row">
                                                <div class="col-8 col-md-6"> <label class="pay">Card Number</label>
                                                    <input type="text" name="cardno" id="cr_no"
                                                        placeholder="0000-0000-0000-0000" minlength="19" maxlength="19">
                                                </div>
                                                <div class="col-4 col-md-6"> <label class="pay">CVV</label> <input
                                                        type="password" name="cvcpwd"
                                                        placeholder="&#9679;&#9679;&#9679;" class="placeicon"
                                                        minlength="3" maxlength="3"> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12"> <label class="pay">Expiration Date</label>
                                                </div>
                                                <div class="col-md-12"> <input type="text" name="exp" id="exp"
                                                        placeholder="MM/YY" minlength="5" maxlength="5"> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{route('borrower.check_s',$borrower->id)}}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status" value="3">
                                                        <input type="submit" value="MAKE A PAYMENT &nbsp; &#xf178;"
                                                            class="btn btn-info placeicon">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop