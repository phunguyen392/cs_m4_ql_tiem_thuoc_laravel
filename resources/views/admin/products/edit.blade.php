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




        <div class="container">
            <form action="<?php echo route('products.update', $product->id); ?>" method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <p>
                    <label for="product_name">Product Name:<br></label>
                    <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}">
                    @error('product_name')
                    <div style="color:blue">{{ $message }}</div>
                @enderror
                </p>
                <p>
                    <label for="category_id">Category:<br></label>
                    <select name="category_id" style="width: 177px;">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label for="quantity">Quantity:<br></label>
                    <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}">
                </p>
                <p>
                    <label for="price">Price:<br></label>
                    <input type="number" id="price" name="price" value="{{ $product->price }}">
                </p>
                <p>
                    <label for="image">Image:<br></label>
                    <input type="file" id="name" name="image" value="{{ $product->image }}">
                </p>

                <p>
                    <label for="status">Status:<br></label>
                    <select name="status">
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Hết hàng</option>
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                    </select>
                </p>
                <p>
                    <label for="description">DESCRIPTION :</label>
                    <textarea name="description" id="description">{{ $product->description }}</textarea>
                </p>
                <input type="submit" value="Update">


            </form>
        </div>
        <style>
            .container {
                display: flex;
                justify-content: center;
                text-align: center;
                align-items: center;
                height: 85vh;
            }
        </style>
    </body>

    </html>
@endsection
