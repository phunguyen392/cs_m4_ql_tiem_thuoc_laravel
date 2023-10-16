@extends('admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  




<table class="table table-bordered" border="2">
    <tr>
        <th>{{ __('language.tt') }}</th>
        <th>{{ __('language.description') }}</th>
        <th>{{ __('language.action') }}</th>

    </tr>
    <tr>
        <td>{{$cate->id}}</td>
        <td>{!! $cate->description !!}</td>
      <td>  
                <a href="{{route('categories.index')}}" class="btn btn-warning">BACK</a>
      </td>
    </tr>
</table>


</body>
</html>

@endsection