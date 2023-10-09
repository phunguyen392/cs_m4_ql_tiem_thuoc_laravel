@extends('admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS của Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Product Create</title>
</head>

<body>

    <div class="container centered-form" style="color: blueviolet;">
        <h1>Product Create</h1>
    </div>
    <div class="container centered-form text-align:center">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="product_name" >Product Name:</label><br>
                <input type="text" name="product_name" id="product_name">
                @error('product_name')
            <div style="color:blue">{{ $message }}</div>

            @enderror
            </p>
            <p>
                <label for="category_id">Category:</label><br>
                <select name="category_id" style="width: 177px;">
                    @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                    @endforeach
                </select>
            </p>

            <p>
                <label for="quantity">Quantity:</label><br>
                <input type="number" name="quantity" id="quantity">
            </p>

            <p>
                <label for="price">Price:</label><br>
                <input type="number" name="price" id="price">
            </p>
            <p>
                <label>Image:</label><br>
                <input type="file" name="image">
            </p>

            <p>
                <label>Status:</label><br>
                <select name="status">
                    <option value="0">het hang</option>
                    <option value="1">con hang</option>

                </select>
            </p>     
            <p>
                <label>Description:</label><br>
              <input type="textarea" name="description">
            </p>

            <input type="submit" value="New Add">
        </form>
    </div>
</body>

</html>
<style>
    .container {
   display: flex;
   justify-content: center;
   text-align: center;
}

</style>
@endsection