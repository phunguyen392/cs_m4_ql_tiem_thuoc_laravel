@extends('user.master')
@section('content')
    <h1 class="offset-4">Đơn hàng</h1>
    <hr>
    <td> <a style="width:50%" class="btn btn-warning" href="{{ route('export') }}">Xuất file excel </a> </td>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">Email</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Password</th>

                <th scope="col">Tùy Chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->customer->address }}</td>
                    <td>{{ $order->customer->email }}</td>
                    <td>{{ $order->customer->phone }}</td>
                    <td>{{ $order->customer->password }}</td>
                    {{-- <td>{{ $order->date_at }}</td> --}}

                    <td>
                        <a class='btn btn-info' href="{{ route('orders.detail', $order->id) }}">Chi tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection