@extends('layouts.admin')
@section('title', 'Add new Banner')
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
    <div class="ml-3 mr-3 pt-3 pt3">
        <form class="" action="{{route('admin.banner.store')}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4"><a href="{{route('admin.banner.index')}}" class="btn btn-danger float-left"
                        onclick="return confirm('Bạn có chắc chắn muốn hủy ?')"><i
                            class="fa fa-arrow-alt-circle-left"></i>Cancel</a>
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i>Save</button>
                </div>
            </div>
            <div class="row pb-5 pt-4" style="margin: 0 15px 0 15px;">
                <div class="col-md-8">
                    <h2 class="bn-m text-center">Home</h2>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Image Slides:</label>
                        <input type="file" class="form-control" name="uploads[]" multiple style="height:50px;">
                    </div>
                    <div class="form-group text-center">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" style="font-weight: bold;">Image store 1:</label>
                                <input type="file" id="upload-store-1" name="home_store_1" class="form-control"
                                    style="display: none;">
                                <img id="show_thumb_1"
                                    src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                                    style="width:100%;cursor: pointer;">
                            </div>
                            <div class="col-md-4">
                                <label for="" style="font-weight: bold;">Image store 2:</label>
                                <input type="file" id="upload-store-2" name="home_store_2" class="form-control"
                                    style="display: none;">
                                <img id="show_thumb_2"
                                    src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                                    style="width:100%;cursor: pointer;">
                            </div>
                            <div class="col-md-4">
                                <label for="" style="font-weight: bold;">Image store 3:</label>
                                <input type="file" id="upload-store-3" name="home_store_3" class="form-control"
                                    style="display: none;">
                                <img id="show_thumb_3"
                                    src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                                    style="width:100%;cursor: pointer;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" style="font-weight: bold;">Image order:</label>
                                <input type="file" id="home-order" name="home_order" class="form-control"
                                    style="display: none;">
                                <img id="show_thumb_4"
                                    src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                                    style="width:100%;height:200px;cursor: pointer;">
                            </div>
                            <div class="col-md-6">
                                <label for="" style="font-weight: bold;">Image Comment:</label>
                                <input type="file" id="home-comment" name="home_comment" class="form-control"
                                    style="display: none;">
                                <img id="show_thumb_5"
                                    src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                                    style="width:100%;height:200px;cursor: pointer;">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group text-center mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="bn-m">Shop</h2>
                                <input type="file" id="shop" name="shop" class="form-control"
                                    style="display: none;">
                                <img id="show_thumb_10"
                                    src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                                    style="width:100%;height:200px;cursor: pointer;">
                            </div>
                            <div class="col-md-6">
                                <h2 class="bn-m">Product Detail</h2>
                                <input type="file" id="product-detail" name="product_detail" class="form-control"
                                    style="display: none;">
                                <img id="show_thumb_11"
                                    src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                                    style="width:100%;height:200px;cursor: pointer;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <h2 class="bn-m">Cart</h2>
                    <input type="file" id="cart" name="cart" class="form-control"
                        style="display: none;">
                    <img id="show_thumb_6" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                        style="width:100%;height:200px;cursor: pointer;">
                    <hr>
                    <h2 class="bn-m">Borrower</h2>
                    <input type="file" id="borrower" name="borrower" class="form-control"
                        style="display: none;">
                    <img id="show_thumb_7" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                        style="width:100%;height:200px;cursor: pointer;">
                    <hr>
                    <h2 class="bn-m">Order</h2>
                    <input type="file" id="order" name="order" class="form-control"
                        style="display: none;">
                    <img id="show_thumb_8" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                        style="width:100%;height:200px;cursor: pointer;">
                    <hr>
                    <h2 class="bn-m">Account</h2>
                    <input type="file" id="account" name="account" class="form-control"
                        style="display: none;">
                    <img id="show_thumb_9" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                        style="width:100%;height:200px;cursor: pointer;">
                    <div class="mt-4">
                        <a href="{{route('admin.banner.index')}}" class="btn btn-danger float-left"
                            onclick="return confirm('Bạn có chắc chắn muốn hủy ?')"><i
                                class="fa fa-arrow-alt-circle-left"></i>Cancel</a>
                        <button type="submit" class="btn btn-primary float-right"><i
                                class="fa fa-save"></i>Save</button>
                    </div>
                </div>
            </div>
        </form>
</section>
@stop()
@section('css')
<style>
.white {
    background-color: #fff;
}
</style>
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
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
                console.log(file);
                $('#show_thumb_11').attr('src', render.result);
            };
            render.readAsDataURL(file);
        }
    });
})
</script>
@stop()