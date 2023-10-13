@extends('shop.master')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%">Delete</th>
            </tr>
        </thead>
        
        <tbody>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $product)
                    @php
                        $subtotal = $product['price'] * $product['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="{{ Storage::url($product['image']) }}" width="100" height="100"
                                        class="img-responsive" />
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $product['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $product['price'] }} K</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $product['quantity'] }}"
                                class="form-control quantity update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ $subtotal }} K</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Total {{ $total }} K</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ route('shop.home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a>
                  <a href="{{ route('checkout') }}">  <button class="btn btn-success">Checkout</button></a>
                </td>
            </tr>
        </tfoot>
    </table>

@endsection





@section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
<style>
    .custom-image {
        width: 300px;
        /* Đặt kích thước chiều rộng mong muốn */
        height: 200px;
        /* Đặt kích thước chiều cao mong muốn */
    }
</style>
