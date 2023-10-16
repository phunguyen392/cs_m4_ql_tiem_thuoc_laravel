<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, #c369a6, #ffffff);
        }
        .form-wrapper {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff; /* Thêm màu nền trắng cho phần form */
        }
        .form-wrapper h2 {
            margin-bottom: 100px;
            text-align: center;
        }
        .form-wrapper label {
            display: block;
            margin-bottom: 5px;
        }
        .form-wrapper input[type="email"],
        .form-wrapper input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }
        .form-wrapper input[type="email"]::placeholder,
        .form-wrapper input[type="password"]::placeholder {
            color: #999;
        }
        .form-wrapper .nho-dang-nhap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 95px;
        }
        .form-wrapper .nho-dang-nhap label {
            margin-bottom: 10px;
        }
        .form-wrapper .nho-dang-nhap a {
            font-size: 14px;
            text-decoration: none;
        }
        .form-wrapper input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #7c2bc7;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-wrapper input[type="submit"]:hover {
            background-color: #260b89;
        }
        .form-wrapper .error-message {
            color: red;
            margin-top: 5px;
        }
        .custom-input{
            border-radius: 20px;
        }
        label {
  font-size: 28px; /* Kích thước chữ 18px */
}
    </style>
</head>
<body>
<div class="form-wrapper">
    <h2 style="color:blue">Sign In</h2>
    <form action="{{ route('postlogin') }}" method="POST">
        @csrf
        <div class="input-form text-center">
            <label for="email" style="color:blue">Email:</label>
            <input class="custom-input text-center" type="email" id="email" name="email" placeholder="Email Enter" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="input-form text-center">
            <label style="color: blue" for="password">Password:</label>
            <input class="custom-input text-center" type="password" id="password" name="password" placeholder="Password Enter" required>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="nho-dang-nhap">
            <label>
                <input type="checkbox" class="" name="remember"> Remember Me
            </label>
            <a href="#">Forgot Password</a>
        </div> 
        <div class="input-form">
            <input class="custom-input" type="submit" value="Sign In">
        </div>
    </form>
</div>
</body>
</html>