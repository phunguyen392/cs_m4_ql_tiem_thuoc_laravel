<<<<<<< HEAD
<style>
    *{
     margin:0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Roboto', sans-serif;
 }
 section{
     position: relative;
     width: 100%;
     height: 100vh;
     display: flex;
 }
 section .img-bg{
     position: relative;
     width: 50%;
     height: 100%;
 }
 section .img-bg img{
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     object-fit: cover;
 }
 section .noi-dung{
     display: flex;
     justify-content: center;
     align-items: center;
     width: 50%;
     height: 100%;
 }
 section .noi-dung .form{
     width: 50%;
 }
 section .noi-dung .form h2{
     color: #607D8B;
     font-weight: 500;
     font-size: 1.5em;
     text-transform: uppercase;
     margin-bottom: 20px;
     border-bottom: 4px solid #6694E9;
     display: inline-block;
     letter-spacing: 1px;
 }
 section .noi-dung .form .input-form{
      margin-bottom: 20px;
  }
 section .noi-dung .form .input-form span{
      font-size: 16px;
      margin-bottom: 5px;
      display: inline-block;
      color: #607DB8;
      letter-spacing: 1px;
       }
 section .noi-dung .form .input-form input{
      width: 100%;
      padding: 10px 20px;
      outline: none;
      border: 1px solid #607D8B;
      font-size: 16px;
      letter-spacing: 1px;
      color: #607D8B;
      background: transparent;
      border-radius: 30px;
      }
  section .noi-dung .form .input-form input[type="submit"]{
      background: #6694E9;
      color: #fff;
      outline: none;
      border: none;
      font-weight: 500;
      cursor: pointer;
      box-shadow: 0 1px 1px rgba(0,0,0,0.12),
                 0 2px 2px rgba(0,0,0,0.12),
                 0 4px 4px rgba(0,0,0,0.12),
                0 8px 8px rgba(0,0,0,0.12),
                0 16px 16px rgba(0,0,0,0.12);
  }
 section .noi-dung .form .input-form input[type="submit"]:hover{
      background: #6694E9;
  }
  section .noi-dung .form .nho-dang-nhap{
      margin-bottom: 10px;
      color: #607D8B;
      font-size: 14px;
  }
  section .noi-dung .form .input-form p{
      color: #607D8B;
  }
 section .noi-dung .form .input-form p a{
      color: #FFB3B3;
  }
 section .noi-dung .form h3{
      color: #607D8B;
      text-align: center;
      margin: 80px 0 10px;
      font-weight: 500;
  }
 section .noi-dung .form .icon-dang-nhap{
      display: flex;
      justify-content: center;
      align-items: center;
  }
 section .noi-dung .form .icon-dang-nhap li{
      list-style: none;
      cursor: pointer;
      width: 50px;
      height: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(1){
      color: #3B5999;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(2){
      color: #DD4B39;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(3){
      color: #55ACEE;
  }
  section .noi-dung .form .icon-dang-nhap li i{
      font-size: 24px;
  }
 @media (max-width: 768px){
     section .img-bg{
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
     }
     section .noi-dung{
         display: flex;
         justify-content: center;
         align-items: center;
         width: 100%;
         height: 100%;
         z-index: 1;
     }
     section .noi-dung .form{
         width: 100%;
         padding: 40px;
         background: rgba(255 255 255 / 0.9);
         margin: 50px;
     }
     section .noi-dung .form h3{
         color: #607D8B;
         text-align: center;
         margin: 30px 0 10px;
         font-weight: 500;
     }
 }
 </style>
 <section>
     <!--Bắt Đầu Phần Hình Ảnh-->
     <div class="img-bg">
         <img src="https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/tao_trang_dang_nhap/hinh_anh_minh_hoa.jpg" alt="Hình Ảnh Minh Họa">
     </div>
     <!--Kết Thúc Phần Hình Ảnh-->
     <!--Bắt Đầu Phần Nội Dung-->
     <div class="noi-dung">
         <div class="form">
             <h2>Sign Please</h2>
             <form action="{{ route('postlogin') }}" method="POST" >
                @csrf
                 <div class="input-form">
                     <span>Email</span>
                     <input type="text" name="email">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('email') }}</p>
                 @endif
                 </div>
                 <div class="input-form">
                     <span>Password</span>
                     <input type="password" name="password">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('password') }}</p>
                 @endif
                 </div>
                 <div class="nho-dang-nhap">
                     <label><input type="checkbox" name="remember"> Nhớ Đăng Nhập</label>
                     <a href="">Quên Mật Khẩu</a>
                 </div>
                 <div class="input-form">
                     <input type="submit" value="Đăng Nhập">
                 </div>
             </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
    @php
    if(Session::has('okmail')){
    @endphp
    Swal.fire({
         icon: 'success',
         title: 'Lấy mật khẩu thành công!',
         text: "Bạn chưa nhận được Email? Liên hệ SuperAdmin để xin cấp lại mật khẩu nhé!!! LH:0376301480 Email: tpnshop247@gmail.com",
         showClass: {
         popup: 'swal2-show'
             }
         })
     @php
    }
     @endphp
     </script>
 </section>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>





    @if(session('error'))
    <script>
        window.onload = function() {
            alert('{{ session('error') }}');
        };
    </script>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <h2 class="text-center mb-4">Đăng nhập</h2>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required
                                    autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Ghi nhớ đăng nhập</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                            </div>

                            <div class="text-center">
                                <a href="">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
>>>>>>> 8b1be9099ff3a954a44c8096a323bbbe50112dfa
