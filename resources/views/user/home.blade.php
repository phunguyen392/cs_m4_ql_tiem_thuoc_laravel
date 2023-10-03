@extends('user.master')
@section('content')
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">PRODUCTS</span></h2>
                <div class="row px-xl-5">
                @foreach ($products as $pro)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">

                            <img class="img-fluid w-100" src="{{ Storage::url($pro->image) }}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{ route('user.detail', ['id' => $pro->id]) }}">{{ $pro->product_name }}</a>
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
                            <h5>@if ($pro->status == 0)
                                <h5>{{ $pro->status }}</h5>
                            @endif
                                
                            </h5>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
    {{ $products->links() }}

@endsection
