@extends('shop.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <div class="card">
        <div class="card-body">
            <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="container-fluid pt-5 pb-3">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                    class="bg-secondary pr-3">PRODUCTS</span></h2>
            <div class="row px-xl-5">
                @foreach ($products as $pro)
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100 custom-image" src="{{ Storage::url($pro->image) }}"
                                    alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ route('add.to.cart', ['id' => $pro->id]) }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate"
                                    href="{{ route('shop.detail', ['id' => $pro->id]) }}">{{ $pro->product_name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <div>
                                        <h5>{{ $pro->price }} K </h5>
                                    </div>
                                    {{-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> --}}
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
    </div>
    
    {{-- <table class="table">
        <tr>
            <td>
                <section class="discount">
                    <div class="container">
                        <div class="flex-row">
                            <div class="col-lg-6 p-0">
                                <div class="discount__text">
                                    <div class="discount__text__title">
                                        <h5><span>Sale</span> 50%</h5>
                                        <h2>Thời gian có hạn nhanh tay, nhanh tay</h2>
                                    </div>
                                    <div class="discount__countdown" id="countdown-time">
                                        <div class="countdown__item">
                                            <span id="minutes"></span>
                                            <h5>Min</h5>
                                        </div>
                                        <div class="countdown__item">
                                            <span id="seconds"></span>
                                            <h5>Sec</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </td>
        </tr>
    </table> --}}

    <script>
        // Set the date and time for the countdown
        var countdownDate = new Date("2023-12-31T23:59:59").getTime();

        // Update the countdown every 1 second
        var countdownTimer = setInterval(function() {
            // Get the current date and time
            var now = new Date().getTime();

            // Calculate the distance between now and the countdown date
            var distance = countdownDate - now;

            // Calculate the days, hours, minutes, and seconds remaining
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown in the HTML elements
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

            // If the countdown is finished, display a message
            if (distance < 0) {
                clearInterval(countdownTimer);
                document.getElementById("countdown-time").innerHTML = "Sale has ended!";
            }
        }, 1000);
    </script>






    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="video-container">
        <!-- Dán URL video từ YouTube vào đây -->
        <iframe width="560" height="315" src="https://www.youtube.com/embed/MPn6E4za7Os" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </body>

    </html>
    {{ $products->links() }}

    <style>
        .custom-image {
            width: 300px;
            height: 200px;
        }

        .countdown__item {
            display: inline-block;
            margin-right: 10px;
        }

        .p {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
@endsection


