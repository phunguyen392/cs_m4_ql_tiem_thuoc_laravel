<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>User</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('shop/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('shop/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('shop/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->

    <!-- Topbar End -->
    @include('shop.includes.header');


    <!-- Navbar Start -->
    @if(Route::is('shop.home'))
    @include('shop.includes.navbar');
    @endif
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <!-- Carousel End -->


    <!-- Featured Start -->
    @include('shop.includes.featured');
    <!-- Featured End -->


    <!-- Categories Start -->
    {{-- @include('user.includes.cate_user'); --}}
    <!-- Categories End -->

{{-- chuyen doi ngon ngu --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    let url = "{{ route('changeLang') }}";
    $(".changeLang").change(function(){
        console.log(1)
        window.location.href = url + "?lang="+ $(this).val();
    });
</script>

    <!-- Products Start -->
    {{-- <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/cat-1.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Products Name</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
   
        </div>
    </div> --}}
    <!-- Products End -->


    <!-- Offer Start -->
 
    <!-- Offer End -->


    <!-- Products Start -->
   @yield('content')
    <!-- Products End -->


    <!-- Vendor Start -->
   
    <!-- Vendor End -->


    <!-- Footer Start -->
    @include('shop.includes.footer');
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('shop/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('shop/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('shop/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('shop/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('shop/js/main.js') }}"></script>
   @yield('scripts')

</body>

</html>
