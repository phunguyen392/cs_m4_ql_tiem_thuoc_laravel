@extends('admin.master')
@section('content')
    <h1 class="text-center" style="color: blue">{{ __('language.order') }}</h1>
    <hr>

    {{-- <td> <a style="width:50%" class="btn btn-warning" href="{{ route('export') }}">Xuất file excel </a> </td> --}}
    <div class="card text-center">

        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('language.tt') }}</th>
                        <th scope="col">{{ __('language.name') }}</th>
                        <th scope="col">{{ __('language.address') }}</th>
                        <th scope="col">{{ __('language.email') }}</th>
                        <th scope="col">{{ __('language.phone') }}</th>
                        {{-- <th scope="col">Password</th> --}}

                        <th scope="col">{{ __('language.action') }}</th>
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
                            {{-- <td>{{ $order->customer->password }}</td> --}}
                            {{-- <td>{{ $order->date_at }}</td> --}}
                            <td>
                                <a class='btn btn-success' href="{{ route('orders.detail', $order->id) }}">{{ __('language.show') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $orders->links() }}
    </div>
@endsection
