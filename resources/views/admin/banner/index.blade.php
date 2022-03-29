@extends('layouts.admin')
@section('title', 'Banner Management')
@section('css')
<style>
.white {
    background-color: #fff;
}

.bn-m {
    color: blue;
    font-weight: bold;
}
</style>

@stop()
@section('main')
<section class="white">
@foreach($ban as $data)
<form action="{{route('admin.banner.update',$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="ml-3 mr-3 pt-4 pt3">
        @if($ban->count() > 0)
        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Save</button>
        @else
        <a href="{{route('admin.banner.create')}}" class="btn btn-success btn-xlg" type="button"><i
                class="fa fa-plus"></i> Add new</a>
        @endif
    </div>
    <hr>
    <div class="row pb-5 pt-4" style="margin: 0 15px 0 15px;">
        <div class="col-md-8">
            <div style="border: 1px solid blue;padding: 20px 10px 20px 10px">
                <h2 class="bn-m text-center">Home</h2>
                <!-- Button trigger modal -->
                <label for="" style="font-weight: bold;">Image Slides:</label>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="file" class="form-control w-100" name="uploads[]" multiple
                                    style="height:45px;">
                            </div>
                            <div class="col-md-8">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
               
                <div class="row text-center">
                    
                    @foreach($slides as $sl)
                    <div class="col-md-3 mt-2">
                        <img src="{{url('public/uploads')}}/{{$sl->image}}"
                            style="width:100%;height:115px;">
                        <a href="{{route('admin.delete.deleteSlide',$sl->id)}}" class="btn btn-sm btn-danger"><i
                                class="fas fa-times-circle"></i></a>
                    </div>
                    @endforeach
                </div>


            </div>
            <hr>
            <div class="form-group text-center">
                <div class="row">
                    <div class="col-md-4">
                        <label for="" style="font-weight: bold;">Image store 1:</label>
                        <input type="file" id="upload-store-1" name="home_store_1" class="form-control"
                            style="display: none;">
                        @if($data->img_home_store_1)
                        <img id="show_thumb_1" src="{{url('public/uploads')}}/{{$data->img_home_store_1}}"
                            style="width:100%;cursor: pointer;">
                        @else
                        <img id="show_thumb_1" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                            style="width:100%;cursor: pointer;">
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="" style="font-weight: bold;">Image store 2:</label>
                        <input type="file" id="upload-store-2" name="home_store_2" class="form-control"
                            style="display: none;">
                        @if($data->img_home_store_2)
                        <img id="show_thumb_2" src="{{url('public/uploads')}}/{{$data->img_home_store_2}}"
                            style="width:100%;cursor: pointer;">
                        @else
                        <img id="show_thumb_2" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                            style="width:100%;cursor: pointer;">
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="" style="font-weight: bold;">Image store 3:</label>
                        <input type="file" id="upload-store-3" name="home_store_3" class="form-control"
                            style="display: none;">
                        @if($data->img_home_store_3)
                        <img id="show_thumb_3" src="{{url('public/uploads')}}/{{$data->img_home_store_3}}"
                            style="width:100%;cursor: pointer;">
                        @else
                        <img id="show_thumb_3" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                            style="width:100%;cursor: pointer;">
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" style="font-weight: bold;">Image order:</label>
                        <input type="file" id="home-order" name="home_order" class="form-control"
                            style="display: none;">
                        @if($data->img_home_order)
                        <img id="show_thumb_4" src="{{url('public/uploads')}}/{{$data->img_home_order}}"
                            style="width:100%;height:200px;cursor: pointer;">
                        @else
                        <img id="show_thumb_4" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                            style="width:100%;height:200px;cursor: pointer;">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="" style="font-weight: bold;">Image Comment:</label>
                        <input type="file" id="home-comment" name="home_comment" class="form-control"
                            style="display: none;">
                        @if($data->img_home_comment)
                        <img id="show_thumb_5" src="{{url('public/uploads')}}/{{$data->img_home_comment}}"
                            style="width:100%;height:200px;cursor: pointer;">
                        @else
                        <img id="show_thumb_5" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                            style="width:100%;height:200px;cursor: pointer;">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="form-group text-center mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="bn-m">Shop</h2>
                    <input type="file" id="shop" name="shop" class="form-control" style="display: none;">
                    @if($data->img_shop)
                    <img id="show_thumb_10" src="{{url('public/uploads')}}/{{$data->img_shop}}"
                        style="width:100%;height:200px;cursor: pointer;">
                    @else
                    <img id="show_thumb_10" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                        style="width:100%;height:200px;cursor: pointer;">
                    @endif
                </div>
                <div class="col-md-6">
                    <h2 class="bn-m">Product Detail</h2>
                    <input type="file" id="product-detail" name="product_detail" class="form-control"
                        style="display: none;">
                    @if($data->img_product_detail)
                    <img id="show_thumb_11" src="{{url('public/uploads')}}/{{$data->img_product_detail}}"
                        style="width:100%;height:200px;cursor: pointer;">
                    @else
                    <img id="show_thumb_11" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                        style="width:100%;height:200px;cursor: pointer;">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <h2 class="bn-m">Cart</h2>
        <input type="file" id="cart" name="cart" class="form-control" style="display: none;">
        @if($data->img_cart)
        <img id="show_thumb_6" src="{{ url('public/uploads')}}/{{ $data->img_cart}}"
            style="width:100%;height:200px;cursor: pointer;">
        @else
        <img id="show_thumb_6" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
            style="width:100%;height:200px;cursor: pointer;">
        @endif
        <hr>
        <h2 class="bn-m">Borrower</h2>
        <input type="file" id="borrower" name="borrower" class="form-control" style="display: none;">
        @if($data->img_borrower)
        <img id="show_thumb_7" src="{{ url('public/uploads')}}/{{ $data->img_borrower}}"
            style="width:100%;height:200px;cursor: pointer;">
        @else
        <img id="show_thumb_7" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
            style="width:100%;height:200px;cursor: pointer;">
        @endif
        <hr>
        <h2 class="bn-m">Order</h2>
        <input type="file" id="order" name="order" class="form-control" style="display: none;">
        @if($data->img_order)
        <img id="show_thumb_8" src="{{ url('public/uploads')}}/{{ $data->img_order}}"
            style="width:100%;height:200px;cursor: pointer;">
        @else
        <img id="show_thumb_8" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
            style="width:100%;height:200px;cursor: pointer;">
        @endif
        <hr>
        <h2 class="bn-m">Account</h2>
        <input type="file" id="account" name="account" class="form-control" style="display: none;">
        @if($data->img_account)
        <img id="show_thumb_9" src="{{ url('public/uploads')}}/{{ $data->img_account}}"
            style="width:100%;height:200px;cursor: pointer;">
        @else
        <img id="show_thumb_9" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
            style="width:100%;height:200px;cursor: pointer;">
        @endif
        <div class="mt-4">
            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i>Save</button>
        </div>
    </div>
    </div>
    
    </div>
    <hr>
    </form>
    @endforeach
</section>
@stop()
@section('js')
<script>
$(document).ready(function() {
    $('#show_thumb_1').click(function() {
        $('#upload-store-1').click();
    });
    $('#upload-store-1').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_1').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });

    $('#show_thumb_2').click(function() {
        $('#upload-store-2').click();
    });
    $('#upload-store-2').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_2').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });
    $('#show_thumb_3').click(function() {
        $('#upload-store-3').click();
    });
    $('#upload-store-3').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_3').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });

    $('#show_thumb_4').click(function() {
        $('#home-order').click();
    });
    $('#home-order').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_4').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });
    $('#show_thumb_5').click(function() {
        $('#home-comment').click();
    });
    $('#home-comment').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_5').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });

    $('#show_thumb_6').click(function() {
        $('#cart').click();
    });
    $('#cart').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_6').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });

    $('#show_thumb_7').click(function() {
        $('#borrower').click();
    });
    $('#borrower').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_7').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });
    $('#show_thumb_8').click(function() {
        $('#order').click();
    });
    $('#order').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_8').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });

    $('#show_thumb_9').click(function() {
        $('#account').click();
    });
    $('#account').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_9').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });

    $('#show_thumb_10').click(function() {
        $('#shop').click();
    });
    $('#shop').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_10').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });

    $('#show_thumb_11').click(function() {
        $('#product-detail').click();
    });
    $('#product-detail').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb_11').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });

    $('#show_thumb').click(function() {
        $('#slides').click();
    });
    $('#slides').change(function() {
        var file = $(this).get(0).files[0];
        if (file) {
            var render = new FileReader();
            render.onload = function() {
                // console.log(file);
                $('#show_thumb').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });
})
</script>
@stop()