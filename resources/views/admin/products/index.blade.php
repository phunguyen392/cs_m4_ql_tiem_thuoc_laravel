@extends('admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Product</title>
    </head>

    <body>
        <!-- Kiểm tra xem có thông báo thành công hay không và hiển thị SweetAlert2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
        {{-- @if (session('successMessage'))
            <script>
                Swal.fire({
                    title: "<h6>{{ session('successMessage') }}</h6>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                    width: "300px"
                });
            </script>
        @elseif(session('successMessage1'))
            <script>
                Swal.fire({
                    title: "<h6>{{ session('successMessage1') }}</h6>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                    width: "300px"
                });
            </script>
        @elseif(session('successMessage2'))
            <script>
                Swal.fire({
                    title: "<h6>{{ session('successMessage2') }}</h6>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                    width: "300px"
                });
            </script>
        @endif --}}

        <div class="input-group container text-right">
            <div class="form-outline">
                <form>
                    <input name="keyword" type="search" class="form-control" placeholder="{{ __('language.search') }}">
            </div>
            <button id="search-button" type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
            </form>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="container">

                <a class="btn btn-info" href="{{ route('products.create') }}">
                    {{ __('language.new add') }}
                </a>
                <div class="text-center">
                    <h1 style="color: blue">{{ __('language.product') }}</h1>
                </div>
                <hr>
                <div class="container text-center">
                    <table class="table align-items-center   table-hover  border-dark">
                        <thead>
                            <tr class="text-center">
                                <th class="col-md-2 col-sm-6">{{ __('language.tt') }}</th>
                                <th class="col-md-2 col-sm-6">{{ __('language.product_name') }}</th>
                                <th class="col-md-2 col-sm-6">{{ __('language.category_name') }}</th>
                                <th class="col-md-2 col-sm-6">{{ __('language.quantity') }}</th>
                                <th class="col-md-2 col-sm-6">{{ __('language.price') }}</th>
                                <th class="col-md-2 col-sm-6">{{ __('language.image') }}</th>
                                <th class="col-md-2 col-sm-6">{{ __('language.status') }}</th>
                                <th class="col-md-2 col-sm-6">{{ __('language.action') }}</th>
                            </tr>
                            @foreach ($items as $key => $item)
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <img style="width:100%; height:100%" src="{{ asset($item->image) }}" alt="Hình ảnh">
                                    {{-- <td>{{ $product->discription }}</td> --}}
                                <td>
                                    @if ($item->status == 0)
                                        Hết hàng
                                    @else
                                        Còn hàng
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex">
                                        <form>
                                            <a href="{{ route('products.edit', $item->id) }}"
                                                class="btn btn-primary">{{ __('language.edit') }}
                                            </a>
                                        </form>

                                        <form action="{{ route('products.softdeletes', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-danger">{{ __('language.delete') }}</button>
                                        </form>
                                        <a href="{{ route('products.show', $item->id) }}"
                                            class="btn btn-success">{{ __('language.show') }}</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>

        {{ $items->links() }}
    </body>

    </html>
@endsection
