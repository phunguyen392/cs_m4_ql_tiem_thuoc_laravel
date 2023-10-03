@extends('admin.master')
@section('content')
<table border="1">
    <tr>
    <tr class="text-center">
        <th class="col-md-2 col-sm-6">ID</th>
        <th class="col-md-2 col-sm-6">Product Name</th>
        <th class="col-md-2 col-sm-6">category name</th>
        <th class="col-md-2 col-sm-6">Quantity</th>
        <th class="col-md-2 col-sm-6">Price</th>

        <th class="col-md-2 col-sm-6">image</th>
        <th class="col-md-2 col-sm-6">Status</th>
        <th class="col-md-2 col-sm-6">Action</th>
    </tr>

    </tr>
    <tr>
        <td>{{$pro->id}}</td>
        <td>{{$pro->product_name}}</td>
        <td>{{$pro->category->category_name}}</td>
        <td>{{$pro->quantity}}</td>
        <td>{{$pro->price}}</td>


        <td> <img src="{{Storage::url($pro->image)}}" alt="chua hien thi" width="100px"></td>

        <td>
            @if($pro->status == 0)
            Hết hàng
            @else
            Còn hàng
            @endif
        </td>

        <td>
            <a href="{{route('products.index')}}" class="btn btn-warning">BACK</a>
        </td>

    </tr>
</table>
@endsection