@extends('layouts.admin')
@section('title', 'Add new Product')
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
    <form class="" action="{{route('product.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="row pb-5 pt-4" style="margin: 0 15px 0 15px;">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Product's Name:</label>
                    <input name="name" class="form-control" value="{{old('name')}}" placeholder="Input field"
                        aria-describedby="helpId">
                    @error('name')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Description:</label>
                    <textarea class="form-control summernote" name="description"
                        style="height:215px !important;">{{old('description')}}</textarea>
                    @error('description')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Other Photo:</label>
                    <input type="file" class="form-control" name="uploads[]" multiple style="height:50px;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Category:</label>
                    <select class="form-control" name="category_id">
                        <option>Select one</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}" {{old('category_id') == $cat->id ? 'selected' : ''}}>{{$cat->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Author:</label>
                    <select class="form-control" name="author_id">
                        <option>Select one</option>
                        @foreach($ats as $at)
                        <option value="{{$at->id}}" {{old('author_id') == $at->id ? 'selected' : ''}}>{{$at->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('author_id')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Price:</label>
                    <input name="price" class="form-control" value="{{old('price')}}" placeholder="Input field"
                        aria-describedby="helpId">
                    @error('price')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Sale Price:</label>
                    <input name="sale_price" class="form-control" value="{{old('sale_price')}}"
                        placeholder="Input field" aria-describedby="helpId">
                    @error('sale_price')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Status</label>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="status" value="0" {{old('status') == 0 ? 'checked' : ''}} /> Sold
                            Out!
                        </label>
                        <label for="">
                            <input type="radio" name="status" value="1" {{old('status') == 1 ? 'checked' : ''}} /> HOT!
                        </label>
                        <label for="">
                            <input type="radio" name="status" value="2" {{old('status') == 2 ? 'checked' : ''}} /> SALE!
                        </label>
                    </div>
                    @error('status')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Image:</label>
                    <input type="file" name="upload" class="form-control upload" style="display: none;">
                    <img id="show_thumb" src="https://thailamlandscape.vn/wp-content/uploads/2017/10/no-image.png"
                        style="width:100%;cursor: pointer;">
                    @error('upload')
                    <small style="color: red;">{{$message}}</small>
                    @enderror
                </div>
                <a href="{{route('product.index')}}" class="btn btn-danger float-left"
                    onclick="return confirm('Bạn có chắc chắn muốn hủy ?')"><i
                        class="fa fa-arrow-alt-circle-left"></i>Cancel</a>
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i>Save</button>
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