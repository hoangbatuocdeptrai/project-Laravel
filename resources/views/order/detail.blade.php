<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Order</title>
    <style>
    .email-content {
        color: red;
        border: 1px solid red;
        /* text-align: center; */
    }

    .link-order {
        margin-bottom: 20px;
    }

    .view-order-2 {
        margin-top: 20px;
        /* border: 1px dashed red; */
        border-top: none;
        width: 650px;
        margin: 0 auto;
        margin-bottom: 40px;
    }

    .tb-1 {
        width: 550px;
        margin: 0 auto;
        border: 1px solid red;
        border-spacing: 0;
    }
    .tb-2 {
        width: 550px;
        margin: 0 auto;
        border: 4px double red;
        border-spacing: 0;
    }

    .dam {
        border-bottom: 3px solid red;
        border-right: 2px solid red;
        padding: 5px;
    }

    .td-m {
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

    .tab-left {
        margin-top: 180px;
        text-align: left;

    }

    .row {
        width: 500px;
        margin: 0 auto;

    }

    .text-left {
        margin-left: 30px;
    }

    .top {
        margin-top: 5px;
    }
    </style>
</head>

<body style="font-family: 'AdorshoLipi', Arial, sans-serif !important;">
    <div class="email-content">
        <div class="row" style="display: flex;border: 1px solid #red;">
            <div class="col-md-6" style="float:left;margin-left: -12px;">
                <h1 class="text-left">Witter</h1>
                <p class="text">Address: Hà Nội - Việt Nam</p>
                <p class="text">Email: bkapc2009i1@gmail.com</p>
                <p class="text">Phone: 0368011513</p>
            </div>
            <div class="col-md-6 top" style="float:right;">
                <h2 style="margin-left:40px;">Bill Of Sale</h2>
                <p style="margin-top:-20px;margin-left:17px;font-weight:bold;">- - - - - - - - - - - - - - - - - -</p>
                <p style="margin-top:-15px;margin-left:66px;font-weight:bold;"><i>Code: #40</i></p>
                <p style="margin-top:-15px;margin-left:18px;font-weight:bold;">Order date: 17/12/2030</p>
            </div>
        </div>
        <div class="view-order-2">
            <table class="tb-1 tab-left">
                <tr>
                    <th width="50%" style="border-bottom: 1px solid #red;border-right: 1px solid #red;">Orderer</th>
                    <th width="50%" style="border-bottom: 1px solid #red;">Receiver</th>
                </tr>
                <tr>
                    <td style="border-right: 1px solid #red;padding-left: 10px;">Name: {{$order->name}}</td>
                    <td style="padding-left: 10px;">Name: </td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid #red;padding-left: 10px;">Email: {{$order->email}}</td>
                    <td style="padding-left: 10px;">Email: </td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid #red;padding-left: 10px;">Phone: {{$order->phone}}</td>
                    <td style="padding-left: 10px;">Phone: </td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid #red;padding-left: 10px;">Address: {{$order->address}}</td>
                    <td style="padding-left: 10px;">Address: </td>
                </tr>
            </table>
            <div>
                <h2 style="text-align:center;">
                List of products
                </h2>
            </div>
            <table class="tb-2">
                <tr>
                    <th class="dam" width="30">STT</th>
                    <th class="dam">Product's name</th>
                    <th class="dam" width="40">Price</th>
                    <th class="dam" width="20">Amount</th>
                    <th class="dam" class="r-none" width="70" style="border-right: none;">Into Money</th>
                </tr>
                @foreach($order->details as $item)
                <?php
                    $sub_total = $item->price * $item->quantity;
                ?>
                <tr>
                    <td class="td-m" style="text-align:center;">1</td>
                    <td class="td-m" style="text-align:center;">{{$item->prod->name}}</td>
                    <td class="td-m" style="text-align:center;">${{number_format($item->price)}}</td>
                    <td class="td-m" style="text-align:center;">{{$item->quantity}}</td>
                    <td class="r-none td-m" style="text-align:center;">{{$sub_total}}</td>
                </tr>
                @endforeach
                <tr>
                    <td class="b-none td-m" style="text-align:center;"></td>
                    <td class="b-none td-m" style="text-align:center;"><b>Total</b></td>
                    <td class="b-none td-m" style="text-align:center;"></td>
                    <td class="b-none td-m" style="text-align:center;"></td>
                    <td class="b-none r-none td-m" style="text-align:center;"><b>{{number_format($order->total_price)}}</b></td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</body>

</html>