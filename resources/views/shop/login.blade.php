<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    @if(session('error'))
    <p>{{ session('error') }}</p>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <h2 class="text-center mb-4">Đăng nhập</h2>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('shop.checklogin') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Ghi nhớ đăng nhập</label>
                                </div>
                            </div>

                            <div class="form-group" style="display: flex; justify-content: center;">
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                <a href="{{ route('shop.register') }}" class="btn btn-info">
                                    <i class="fas fa-user-plus"></i></a>
                                <a href="{{ route('shop.home') }}" class="btn btn-warning">
                                    <i class="fas fa-home"></i>
                                  </a>
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