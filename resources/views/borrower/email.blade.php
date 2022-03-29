<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Order</title>
    <style>
    .email-content {
        text-align: center;
    }
    .link-order {
        margin-bottom: 20px;
    }
    .border-full {
        text-align: center;
        margin: 0 auto;
        width: 750px;
        border: 1px dashed red;
    }
    .view-order {
        /* border: 1px dashed red; */
        width: 700px;
        margin: 0 auto;
        color: red;
        overflow: hidden;
        border-bottom: none;
    }
    .view-order-2 {
        margin-top: 20px;
        /* border: 1px dashed red; */
        border-top: none;
        width: 700px;
        margin: 0 auto;
        color: red;
        margin-bottom: 40px;
    }
    .customer {
        width:300px;
        float: left;
    }
    .order {
        width:400px;
        margin: 0;
        float: right;
        padding-bottom: none;
    }
    .order h2{
        font-weight: bold;
        margin-bottom: 2px;
    }
    .tb-2 {
        width: 600px;
        margin: 0 auto;
        border: 4px double red;
        border-spacing: 0;
    }
    th {
        border-bottom: 3px solid red;
        border-right: 2px solid red;
        padding: 5px;
    }
    td {
        border-bottom: 2.5px dashed red;
        border-right: 2px solid red;
        padding: 5px;
    }
    .r-none {
        border-right: none;
    }
    .b-none {
        border-bottom: none;
    }
    .cl-a {
        background-color: yellow;
        display: inline-block;
        padding: 10px 25px;
        text-decoration: none;
        border-radius: 50%;
        color: #000;
    }
    .cl-a:hover {
        background-color: blue;
        display: inline-block;
        padding: 10px 25px;
        text-decoration: none;
        border-radius: 50%;
        color: #fff;
    }
    .text-one {
        font-size: 25px;
        margin: 0;
    }
    .text {
        margin: 0;
        font-weight: bold;
    }
    .text-s {
        margin: unset;
        font-size: 20px;
        font-weight: bold;
    }
    .text-t {
        margin: -20px 0 0 0;
        /* font-size: 20px; */
        font-weight: bold;
    }
    .info-user {
        width: 600px;
        margin: 0 auto;
        float: none;
    }
    .tab-left {
        margin-top: 30px;
        margin-left: 50px;
        text-align: left;
    }
    </style>
</head>
<body>
    <div class="email-content">
        <div class="link-order">
            <h3>Hello {{$auth->name}}</h3>
            <p>You borrowed a book at our online store with your loan code: {{$borrower->token}}</p>
        </div>
        <div class="border-full">
            <div class="view-order">
                <div class="customer">
                    <h2>WRITER</h2>
                    <p class="text text-t">Address: Ha Noi - Viet Nam</p>
                    <p class="text">Email: writer@gmail.com</p>
                    <p class="text">Phone: 837127879 - 263712920</p>
                    <p class="text">Website: www.writer.vn</p>
                </div>
                <div class="order">
                    <h2>Loan Slip</h2>
                    <p class="text-s">-------------------</p>
                    <p class="text"><i>Code: #{{$borrower->token}}</i></p>
                    <p class="text">Borrowing date: {{$borrower->created_at}}</p>

                </div>
        </div>
        <div class="view-order-2">
            <div class="tab-left">
                <p class="text">Borrower: {{$borrower->name}}</p>
                <p class="text">Phone: {{$borrower->phone}}</p>
                <p class="text">Address: {{$borrower->address}}</p>
            </div>
            <table class="tb-2">
                <tr>
                    <th width="30">STT</th>
                    <th>Product name</th>
                    <th width="60">Amount</th>
                </tr>
                <?php $key=1; ?>
                @foreach($borrower->details as $item)
                <?php
                    $sub_total = $item->price * $item->quantity;
                ?>
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$item->prod->name}}</td>
                    <td>{{$item->quantity}}</td>
                </tr>
                <?php $key++; ?>
                @endforeach
            </table>
        </div>
        </div>
    </div>
</body>

</html>