
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Code</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
             body {
     background-color: #BA68C8
 }

 .main-verification-input {
     background: #fff;
     padding: 0 120px 0 0;
     border-radius: 1px;
     margin-top: 6px
 }

 .fl-wrap {
     float: left;
     width: 100%;
     position: relative;
     border-radius: 4px
 }

 .main-verification-input:before {
     content: '';
     position: absolute;
     bottom: -40px;
     width: 50px;
     height: 1px;
     background: rgba(255, 255, 255, 0.41);
     left: 50%;
     margin-left: -25px
 }

 .main-verification-input-item {
     float: left;
     width: 100%;
     box-sizing: border-box;
     border-right: 1px solid #eee;
     height: 50px;
     position: relative
 }

 .main-verification-input-item input:first-child {
     border-radius: 100%
 }

 .main-verification-input-item input {
     float: left;
     border: none;
     width: 100%;
     height: 50px;
     padding-left: 20px
 }

 .main-verification-button {
     background: #4DB7FE
 }

 .main-verification-button {
     position: absolute;
     right: 0px;
     height: 50px;
     width: 120px;
     color: #fff;
     top: 0;
     border: none;
     border-top-right-radius: 4px;
     border-bottom-right-radius: 4px;
     cursor: pointer
 }

 .main-verification-input-wrap {
     max-width: 500px;
     margin: 20px auto;
     position: relative;
     margin-top: 129px
 }

 .main-verification-input-wrap ul {
     background-color: #fff;
     padding: 27px;
     color: #757575;
     border-radius: 4px
 }

 a {
     text-decoration: none !important;
     color: #9C27B0
 }

 :focus {
     outline: 0
 }

 @media only screen and (max-width: 768px) {
     .main-verification-input {
         background: rgba(255, 255, 255, 0.2);
         padding: 14px 20px 10px;
         border-radius: 10px;
         box-shadow: 0px 0px 0px 10px rgba(255, 255, 255, 0.0)
     }

     .main-verification-input-item {
         width: 100%;
         border: 1px solid #eee;
         height: 50px;
         border: none;
         margin-bottom: 10px
     }

     .main-verification-input-item input {
         border-radius: 6px !important;
         background: #fff
     }

     .main-verification-button {
         position: relative;
         float: left;
         width: 100%;
         border-radius: 6px
     }
 }
        </style>
    </head>
    <body>
    <div class="row">
    <div class="col-md-12">
        <div class="main-verification-input-wrap">
            <ul>
                <li>You will recieve a verification code on your mail after you registered. Enter that code below.</li>
                <li>If somehow, you did not recieve the verification email then <a href="#">resend the verification email</a></li>
            </ul>
            <form action="" method="post">
                @csrf
                <div class="main-verification-input fl-wrap">
                    <input type="hidden" name="code" value="{{rand(10000,100000)}}">
                    <div class="main-verification-input-item"> <input type="text" value="" name="email" placeholder="Enter the verification code"> </div> <button class="main-verification-button">Verify Now</button>
                </div>
            </form>
            <a style="text-align:center" href="{{route('cart.view')}}">Back Cart</a>
        </div>
    </div>
</div>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
