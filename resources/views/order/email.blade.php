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
            <p>B???n ???? ?????t h??ng t???i c???a h??ng online c???a ch??ng t??i ????? x??c nh???n ????n h??ng vui l??ng click v??o link d?????i ????y ?????
            x??c nh???n.</p>
            <a class="cl-a" href="{{route('customer.confirm', $orders->token)}}">Click v??o ????y</a>
        </div>
        <div class="border-full">
            <div class="view-order">
                <div class="customer">
                    <h2>COLO SHOP</h2>
                    <p class="text text-t">?????a ch???: </p>
                    <p class="text">Email: ......</p>
                    <p class="text">Phone: .......</p>
                    <p class="text">Website: www.abc.vn</p>
                </div>
                <div class="order">
                    <h2>H??a ????n B??n H??ng</h2>
                    <p class="text-s">-------------------</p>
                    <p class="text"><i>M?? ????n h??ng: #{{$orders->id}}</i></p>
                    <p class="text">Ng??y ?????t h??ng: {{$orders->created_at}}</p>
                </div>
        </div>
        <div class="view-order-2">
            <div class="tab-left">
                <p class="text">Ng?????i ?????t h??ng: {{$orders->name}}</p>
                <p class="text">Phone: {{$orders->phone}}</p>
                <p class="text">?????a ch???: {{$orders->address}}</p>
            </div>
            <table class="tb-2">
                <tr>
                    <th width="30">STT</th>
                    <th>T??n s???n ph???m</th>
                    <th width="80">Gi??</th>
                    <th width="60">S??? l?????ng</th>
                    <th class="r-none" width="100">Th??nh ti???n</th>
                </tr>
                <?php $key=1; ?>
                @foreach($orders->details as $item)
                <?php
                    $sub_total = $item->price * $item->quantity;
                ?>
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$item->prod->name}}</td>
                    <td>${{number_format($item->price)}}</td>
                    <td>{{$item->quantity}}</td>
                    <td class="r-none">{{$sub_total}}</td>
                </tr>
                <?php $key++; ?>
                @endforeach
                <tr>
                    <td class="b-none"></td>
                    <td class="b-none">C???ng</td>
                    <td class="b-none"></td>
                    <td class="b-none"></td>
                    <td class="b-none r-none">{{number_format($orders->total_price)}}</td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</body>

</html>