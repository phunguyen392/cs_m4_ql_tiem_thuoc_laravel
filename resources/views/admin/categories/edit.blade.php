@extends('admin.master')
@section('content')


<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="<?php echo route('categories.update',$cate->id)?>" method ="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <label for="category_name">{{ __('language.category') }}</label><br>
  <input type="text" id="category_name" name="category_name" value="{{$cate->category_name}}"><br>
  <label for="description ">{{ __('language.description') }}</label><br>
  <input type="text" id="description" name="description" value="{{$cate->description}}"><br>
 
  <input type="submit" value="Submit">
</form>


</body>
</html>

@endsection