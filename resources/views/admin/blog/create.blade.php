@extends('layouts.admin')
@section('title', 'Add new Blog')
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
    <form class="" action="{{route('admin.blog.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="row pb-5 " style="margin: 0 15px 0 15px;">
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Name:</label>
                    <input type="text" id="nf-email" name="name" placeholder="Enter Name.."
                        class="form-control">
                    @error('name')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Mô tả SP:</label>
                    <textarea class="form-control summernote" name="news"
                        style="height:215px !important;">{{old('news')}}</textarea>
                    @error('news')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Status</label>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="status" value="0" {{old('status') == 0 ? 'checked' : ''}} /> Ẩn
                        </label>
                        <label for="">
                            <input type="radio" name="status" value="1" {{old('status') == 1 ? 'checked' : ''}} /> Hiện
                        </label>
                    
                    </div>
                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>  
            </div>
            <div class="form-group">
                <label for="nf-email" class=" form-control-label">Vui lòng chọn ảnh:</label>
                <input type="file" id="nf-email" name="image"
                    class="form-control">
                    
                @error('image')
                    <span class="text-danger"><i>{{$message}}</i></span>
                @enderror
            </div>
                <a href="{{route('admin.blog.index')}}" class="btn btn-danger float-left"
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