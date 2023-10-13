@extends('shop.master')
@section('content')
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img lass="img-fluid w-100 custom-image" src="{{ asset('storage/' . $product->image) }}" width="500px"
                                height="300px" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        {{-- <i class="fa fa-2x fa-angle-left text-dark"></i> --}}
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        {{-- <i class="fa fa-2x fa-angle-right text-dark"></i> --}}
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product->product_name }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Đánh giá)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ number_format($product->price) }} K</h3>
                    <p class="font-family">{{ $product->description }}</p>

                    
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-secondary border-0 text-center" value="1">

                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            {{-- <a href="{{route('user.shoping_cart',$product->id)}}" id="{{ $product->id }}" class="btn btn-danger mt-20">Thêm vào giỏ hàng</a> --}}
                        </div>

                        {{-- <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-secondary border-0 text-center" value="">

                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                        <a href="{{ route('add.to.cart', ['id' => $product->id]) }}"><button
                                class="btn btn-primary">Add</button></a>
                        <a href="{{ route('cart') }}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-primary border border-primary rounded-circle"
                                style="padding-bottom: 2px;">{{ count((array) session('cart')) }}</span>
                        </a>
                    </div>
                    <div>
                        <tr>
                            <td colspan="5" class="text-right">
                                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                                    Continue Shopping</a>
                                <a href="{{ route('checkout') }}"><button class="btn btn-success">Checkout</button></a>
                            </td>
                        </tr>
                    </div>

                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<div class="related-products">
    <h2 class="text-center">Related Products</h2>
    <div class="row px-xl-5">
        @foreach ($relatedProducts as $pro)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100 custom-image" src="{{ Storage::url($pro->image) }}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square"
                                href="{{ route('add.to.cart', ['id' => $pro->id]) }}"><i
                                    class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate"
                            href="{{ route('shop.detail', ['id' => $pro->id]) }}">{{ $pro->product_name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{ $pro->price }} K</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>({{ $pro->quantity }} )</small>
                            </div>
                        </div>
                        <h5>
                            @if ($pro->status == 0)
                                <h5>{{ $pro->status }}</h5>
                            @endif

                        </h5>


                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>
  <style>
    .custom-image {
        width: 300px;
        /* Đặt kích thước chiều rộng mong muốn */
        height: 200px;
        /* Đặt kích thước chiều cao mong muốn */
    }
</style>
@endsection

