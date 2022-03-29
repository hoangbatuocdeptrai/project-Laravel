@extends('layouts.admin')
@section('title', 'Edit Category')
@section('css')
<style>
.white {
    background-color: #fff;
}
.red {
    color: red;
    margin-left: 5px;
}
</style>
@stop()
@section('main')
<section class="white">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <form action="" method="POST" enctype="multipart/form-data" role="form">
                @csrf 
                <div class="card mt-4">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="nf-email" class=" form-control-label">Name:</label>
                            <input type="text" id="nf-email" name="name" value="{{$category->name}}"
                                class="form-control">
                            @error('name')
                            <span class="help-block red"><i>{{$message}}</i></span>
                            @enderror
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Status:</label></div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label">
                                            <input type="radio" id="radio1" name="status" value="0" {{$category->status = 0 ? 'Checked' : ''}}
                                                class="form-check-input">Hide
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio2" class="form-check-label">
                                            <input type="radio" id="radio2" name="status" value="1" {{$category->status = 1 ? 'Checked' : ''}}
                                                class="form-check-input">Show
                                        </label>
                                    </div>
                                </div>
                                @error('status')
                                <span class="help-block red"><i>{{$message}}</i></span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <hr>
    <a href="{{route('category.index')}}" class="btn btn-danger ml-3 mb-2">
        <i class="fa fa-mail-reply"></i> Cancel
    </a>
</section>
@stop()