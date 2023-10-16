@extends('admin.master')
@section('content')
    <div class="reponse text-center">
    <div class="card">

        <div class="card-body">
            <div class="container">
        <h1 style="color: blue">{{ __('language.order_detail') }}</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('language.tt') }}</th>
                            <th scope="col">{{ __('language.product_name') }}</th>
                            <th scope="col">{{ __('language.quantity') }}</th>
                            <th scope="col">{{ __('language.price') }}</th>
                            <th scope="col">{{ __('language.action') }}</th>
 
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach ($oderDetails as $key => $item)
                            @php $total += $item->total @endphp
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->product_name }}</td>

                                <td>{{ $item->quantity }}</td>

                                <td>{{ number_format($item->total) }} K</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('orders.index') }}">{{ __('language.back') }}</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                <span>Tổng Tiền của đơn hàng là: {{ number_format($total) }} K</span>
            @endsection
