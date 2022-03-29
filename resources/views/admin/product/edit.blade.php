@extends('layouts.admin')
@section('title', 'Edit Product - '.$product->name)
@section('css')
<style>
.white {
    background-color: #fff;
}
.sli {
    border: #fb7986;
    background-color: #fb7986;
}
</style>
@stop()
@section('main')
<section class="white">
    <div class="ml-3 mr-3 pt-3 pt3">
        <form class="" action="" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">
                    <a href="{{route('product.index')}}" class="btn sli btn-danger float-left"
                        onclick="return confirm('Are you sure you want to cancel ?')"><i
                            class="fas fa-arrow-alt-circle-left"></i>Cancel</a>
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>Save</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label style="font-weight: bold;">Product's name:</label>
                        <input name="name" id="" class="form-control" value="{{$product->name}}"
                            aria-describedby="helpId">
                        @error('name')
                        <small style="color: red;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Description:</label>
                        <textarea class="form-control summernote"
                            name="description">{{$product->description}}</textarea>
                        @error('description')
                        <small style="color: red;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Other Photo::</label>
                        <input type="file" class="form-control" name="uploads[]" multiple style="height:50px;">
                    </div>
                    <div class="form-group ml-3">
                        <div class="row">
                            @foreach($images as $img)
                            <div class="col-md-3">
                                <a href="" style="">
                                    <img src="{{url('public/uploads/'.$img->image)}}" alt="" class="w-100">
                                </a>
                                <div>
                                    <div class="caption w-100 text-center">
                                        <a href="{{route('delete.deleteImage',$img->id)}}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-times-circle ml-1"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label style="font-weight: bold;">Category:</label>
                        <select class="form-control" name="category_id">
                            <option>select one</option>
                            @foreach($cats as $cat)
                            <option value="{{$cat->id}}" {{$cat->id ==$product->category_id ? 'selected' : ''}}>
                                {{$cat->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small style="color: red;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Author:</label>
                        <select class="form-control" name="author_id">
                            <option>select one</option>
                            @foreach($author as $at)
                            <option value="{{$at->id}}" {{$at->id ==$product->author_id ? 'selected' : ''}}>
                                {{$at->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('author_id')
                        <small style="color: red;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Price:</label>
                        <input name="price" class="form-control" value="{{$product->price}}" aria-describedby="helpId">
                        @error('price')
                        <small style="color: red;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Sale Price:</label>
                        <input name="sale_price" class="form-control" value="{{$product->sale_price}}"
                            aria-describedby="helpId">
                        @error('sale_price')
                        <small style="color: red;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" value="0"
                                    {{$product->status == 0 ? 'checked' : ''}} /> Sold
                                Out!
                            </label>
                            <label>
                                <input type="radio" name="status" value="1"
                                    {{$product->status == 1 ? 'checked' : ''}} /> HOT!
                            </label>
                            <label>
                                <input type="radio" name="status" value="2"
                                    {{$product->status == 2 ? 'checked' : ''}} />
                                SALE!
                            </label>
                        </div>
                        @error('status')
                        <small style="color: red;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Image:</label>
                        <img id="show_thumb" src="{{url('public/uploads/'.$product->image)}}" alt="" width="100%"
                            height="450px" style="cursor: pointer;">
                        <hr>
                        <input type="file" name="upload" id="uploads" class="form-control" placeholder="Input field"
                            aria-describedby="helpId" style="display: none;">
                        @error('upload')
                        <small style="color: red;">{{$message}}</small>
                        @enderror
                    </div>
                    <a href="{{route('product.index')}}" class="btn float-left sli btn-danger"
                        onclick="return confirm('Bạn có chắc chắn muốn hủy ?')"><i
                            class="fas fa-arrow-alt-circle-left"></i>Cancel</a>
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
@stop()
@section('css')
<link rel="stylesheet" href="{{url('public/admin')}}/assets/summernote/summernote.min.css">
@stop()
@section('js')
<script src="{{url('public/admin')}}/assets/summernote/summernote.min.js"></script>
<script>
$('.summernote').summernote({
    height: 400
});
$('#show_thumb').click(function() {
    $('#uploads').click();
});
$('#uploads').change(function() {
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
</script>
@stop()