<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng nhập quản trị</title>
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    /* Importing Google Fonts - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      padding: 15px;
      background: hsl(180, 10%, 74%);
      overflow: hidden;
    }

    .wrapper {
      max-width: 500px;
      width: 100%;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
    }

    .wrapper .title {
      height: 120px;
      background: rgb(65, 73, 102);
      background: linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
      border-radius: 5px 5px 0 0;
      color: #fff;
      font-size: 30px;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wrapper form {
      padding: 25px 35px;
    }

    .wrapper form .row {
      height: 60px;
      margin-top: 15px;
      position: relative;
    }

    .wrapper form .row input {
      height: 100%;
      width: 100%;
      outline: none;
      padding-left: 70px;
      border-radius: 5px;
      border: 1px solid lightgrey;
      font-size: 18px;
      transition: all 0.3s ease;
    }

    form .row input:focus {
      border-color: linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
    }

    form .row input::placeholder {
      color: #999;
    }

    .wrapper form .row i {
      position: absolute;
      width: 55px;
      height: 100%;
      color: #fff;
      font-size: 22px;
      background: linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
      border: 1px solid linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
      border-radius: 5px 0 0 5px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wrapper form .pass {
      margin-top: 12px;
    }

    .wrapper form .pass a {
      color: linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
      font-size: 17px;
      text-decoration: none;
    }

    .wrapper form .pass a:hover {
      text-decoration: underline;
    }

    .wrapper form .button input {
      margin-top: 20px;
      color: #fff;
      font-size: 20px;
      font-weight: 500;
      padding-left: 0px;
      background: linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
      border: 1px solid linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
      cursor: pointer;
    }

    form .button input:hover {
      background: linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
    }

    .wrapper form .signup-link {
      text-align: center;
      margin-top: 45px;
      font-size: 17px;
    }

    .wrapper form .signup-link a {
      color: linear-gradient(90deg, rgba(65, 73, 102, 1) 35%, rgba(14, 19, 83, 1) 100%);
      text-decoration: none;
    }

    form .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="title"><span>Đăng nhập quản trị</span></div>
    <form method="post">
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Tên người dùng" name="ten_nguoi_dung" required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Mật khẩu" required name="mat_khau" />
      </div>
      <div class="pass"><a href="#">Forgot password?</a></div>
      <div class="row button">
        <input type="submit" value="Login" name="login" />
      </div>
      <?php if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>SAI TÀI KHOẢN HOẶC MẬT KHẨU</p>";
        unset($_SESSION['error']);
      } ?>
      <div class="signup-link">Tài khoản mặc định: admin | 1</div>
    </form>
  </div>
  <?php if (isset($_SESSION['message'])): ?>
    <script>
      Swal.fire({
        title: "<?= $_SESSION['message']['title'] ?>",
        text: "<?= $_SESSION['message']['text'] ?>",
        icon: "<?= $_SESSION['message']['icon'] ?>"
      });
    </script>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?>

</body>

</html>