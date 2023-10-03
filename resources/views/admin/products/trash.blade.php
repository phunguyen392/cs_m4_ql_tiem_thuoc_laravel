@extends('admin.master')
@section('content')
<h2 class="offset-4">Thùng rác sản phẩm</h2>
    <div class="table-responsive pt-3">
        <table class="table table-info" style="width:100%">
            <thead>
                <tr>
                    <th style="width:35%">
                        #
                    </th>
                    <th>
                        Tên danh mục đã xóa
                    </th>
                    <th>
                        Tùy chọn
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr data-expanded="true" class="item-{{ $product->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>
                            <form action="{{ route('products.restoredelete', $product->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Khôi Phục</button>
                                <a href="{{ route('product_destroy', $product->id) }}" id="{{ $product->id }}"
                                    class="btn btn-danger">Xóa</a>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection