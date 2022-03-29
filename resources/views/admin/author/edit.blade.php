@extends('layouts.admin')
@section('title', 'Edit Author')
@section('css')
<style>
.white {
    background-color: #fff;
}
</style>
@stop()
@section('main')
<section class="white">
    <div class="ml-3 mr-3 pt-3 pt3">
    <form class="" action="" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="row pb-5 pt-4" style="margin: 0 15px 0 15px;">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Author name:</label>
                    <input name="name" class="form-control" value="{{$author->name}}" placeholder="Input field"
                        aria-describedby="helpId">
                    @error('name')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Description:</label>
                    <textarea class="form-control summernote" name="description"
                        style="height:215px !important;">{{$author->description}}</textarea>
                    @error('description')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Status</label>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="status" value="0" {{$author->status == 0 ? 'checked' : ''}} /> Ẩn
                        </label>
                        <label for="">
                            <input type="radio" name="status" value="1" {{$author->status == 1 ? 'checked' : ''}} /> Hiện
                        </label>
                    </div>
                    @error('status')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Image:</label>
                    <input type="file" name="upload" class="form-control upload" style="display: none;">
                    <img id="show_thumb" src="{{url('public/uploads')}}/{{$author->image}}"
                        style="width:100%;cursor: pointer;">
                    @error('upload')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <a href="{{route('product.index')}}" class="btn btn-danger float-left"
                    onclick="return confirm('Bạn có chắc chắn muốn hủy ?')"><i
                        class="fa fa-arrow-alt-circle-left"></i>Hủy</a>
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i>Lưu lại</button>
            </div>
        </div>
    </form>
</section>
@stop()
@section('css')
    <link rel="stylesheet" href="{{url('public/forgot')}}/summernote/summernote.min.css">
    <style>
    .white {
        background-color: #fff;
    }
    </style>
@stop()
@section('js')
<script>
        $(document).ready(function(){
            $('.summernote').summernote({
                height: 260
            });
            $('#show_thumb').click(function() {
                $('.upload').click();
            });
            $('.upload').change(function() {
                var file = $(this).get(0).files[0];
                if (file) {
                    var render = new FileReader();
                    render.onload = function() {
                        console.log(file);
                        $('#show_thumb').attr('src', render.result);
                    };
                    render.readAsDataURL(file);
                }
            });
        })
    </script>
@stop()