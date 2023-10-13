<!DOCTYPE html>
<html>
<head>
  <title>Form Đăng Nhập</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      max-width: 400px;
      padding: 40px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #333;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Đăng Nhập</h2>
    <form>
      <div class="form-group">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Đăng Nhập</button>
      </div>
    </form>
  </div>
</body>
</html>