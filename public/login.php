<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <?php include '../components/header.php'; ?>

  <div class="container">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class=" my-5 col-md-7 col-lg-5 col-xl-5 border" style="background-color: #F5F5F5;">
        <h1 class="text-center fw-bold mt-5">Đăng nhập</h1>
        <form method="post" action="index.php?act=student">
          <div class="d-flex flex-row align-items-center my-5">
            <i class="fa-solid fa-user rounded-circle me-2" height="30"></i>
            <input type="text" placeholder="Vui lòng nhập tên đăng nhập" class="form-control" id="username" name="username" required>
          </div>
          <div class="d-flex flex-row align-items-center mt-5 position-relative">
            <i class="fa-solid fa-lock rounded-circle me-2" height="30"></i>
            <div class="input-group position-relative">
              <input type="password" placeholder="Vui lòng nhập mật khẩu" class="form-control" id="password" name="password" required>
              <span class="input-group-text border-0 cursor-pointer position-absolute top-50 start-100 translate-middle pe-5 bg-transparent" style="background-color: #ffff; z-index: 1000;" onclick="showPassword()"><i class="fas fa-eye"></i></span>
            </div>
          </div>
          <div class="ms-5 my-3">
            <input type="checkbox">
            <label for="remember">Nhớ mật khẩu</label>
          </div>
          <div class="d-flex justify-content-around align-items-center my-4">
            <button class="btn btn-primary text-white p-2 form-submit" type="submit" value="dangnhap" name="dangnhap">Đăng nhập</button>
          </div>
          <div class="d-flex justify-content-around align-items-center my-4">
            <div class="mb-1"> Bạn chưa có tài khoản? <a href="register.php" class="ps-1 text-primary underline special-link">Đăng ký</a></div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/f4fd0c329a.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    function showPassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
  <?php include '../components/footer.php'; ?>
</body>

</html>