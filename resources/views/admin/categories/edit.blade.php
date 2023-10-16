@extends('admin.master')
@section('content')


<!DOCTYPE html>
<html>
<body>

<div class="heading-container text-center">
<h2>SỬA DANH MỤC</h2>
</div>
<div class="card">
  <div class="card-body">
    <div class="container">
<form action="<?php echo route('categories.update',$cate->id)?>" method ="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group text-center">
  <label class="text-center" for="category_name">{{ __('language.category') }}</label><br>
  <input class="form-control-sm border border-primary" type="text" id="category_name" name="category_name" value="{{$cate->category_name}}"><br>
  <label for="description ">{{ __('language.description') }}</label><br>
  <input type="text" id="description" name="description" value="{{$cate->description}}"><br>
    </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-info ">Update</button>
    <a href="{{ route('categories.index') }}" class="btn btn-warning">BACK</a>

  </div>
</form>

    </div>
  </div>
</div>

</body>
</html>

@endsection