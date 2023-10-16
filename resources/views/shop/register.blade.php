<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 50%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #F1F1F1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #F1F1F1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #980d0d;
            text-align: center;
            width: 20%;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .form {
            width: 50%;
            padding: 15px;
            margin-left:  auto;
            margin-right:  auto;
            display: block;
            border: none;
            background: #ca0fc3;
            text-align: center;
        }
    </style> --}}
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="form-group text-center">
                    <form action="{{ route('shop.checkRegister') }}" method="post">
                        @csrf
                        <div class="form-wrapper">
                            <h1 style="color:blue">Đăng ký</h1>
                            <p>Vui lòng điền đầy đủ thông tin.</p>
                            <p>
                                <label for="name"><b>Name:<br></b></label><br>
                                <input class=" border border-primary custom-input" style="width: 50%" type="text"
                                    placeholder="Enter Name" name="name" id="name" required><br>
                            </p>
                            <p>
                                <label for="email"><b>Email:<br></b></label><br>
                                <input class="border border-primary custom-input" style="width: 50%" type="text"
                                    placeholder="Enter Email" name="email" id="email" required><br>
                            </p>
                            <p>
                                <label for="email"><b>Address:<br></b></label><br>
                                <input class="border border-primary custom-input" style="width: 50%" type="text"
                                    placeholder="Enter address" name="address" required><br>
                            </p>
                            <p>
                                <label for="email"><b>Phone:<br></b></label><br>
                                <input class="border border-primary custom-input" style="width: 50%" type="text"
                                    placeholder="Enter your phone number" name="phone" required><br>
                            </p>
                            <p>
                                <label for="psw"><b>Password:<br></b></label><br>
                                <input style="width: 50%" type="password" class="custom-input border border-primary"
                                    placeholder="Enter Password" name="psw" id="psw" required><br>
                            </p>
                            <p>
                                <label for="psw-repeat"><b>Repeat Password:<br></b></label><br>
                                <input  style="width: 50%" type="password" placeholder="Repeat Password"
                                    class="custom-input border border-primary" name="psw_repeat" id="psw-repeat" required><br>
                            </p>
                            <div>
                                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                            </div>
                            <div>
                                <button type="submit" class="registerbtn btn btn-success">Register</button>
                                <button href="{{ route('shop.login') }}" class="btn btn-primary">Sign in</button>
                                <a href="{{ route('shop.home') }}" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<style>
    .form-wrapper {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f1f1f1;
        border-radius: 5px;
    }
    .custom-input {
    border-radius: 10px;
    
}
input::placeholder {
  text-align: center;
}
</style>
