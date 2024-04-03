<?php
session_start();
require_once __DIR__ . '/../models/dbconnect.php';
require_once __DIR__ . '/../models/student_model.php';
include '../components/add_student_model.php';
$students = [];
$students = get_all_students();
$_SESSION['user_id'] = 12345; // Thiết lập biến phiên 'user_id' là 123
$success = -1;

if (isset($_POST['create'])) {
    $username    = $_POST['username'];
    $id_register  = $_POST['id_register'];
    $address    = $_POST['address'];
    $phone  = $_POST['phone'];
    $password   = $_POST['password'];

    // Kiểm tra nếu id_register là 1 thì mới thực hiện lệnh SQL
    if ($id_register == $_SESSION['user_id']) {
        $sql = "CALL DangKy('$username', '$password', '$phone','$address')";
        try {
            $success = 1;
            $st = $pdo->prepare($sql);
            $st->execute();
        } catch (PDOException $e) {
            $success = 0;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <main>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class=" my-4 col-md-7 col-lg-5 col-xl-5 border" style="background-color: #F5F5F5;">
                    <h1 class="text-center fw-bold mt-2">Đăng kí</h1>
                    <form action="register.php" method="post">
                        <!-- email begin -->
                        <div class="d-flex flex-row align-items-center my-3">
                            <i class="fa-solid fa-user rounded-circle me-2" height="30"></i>
                            <input type="text" placeholder="Nhập tên đăng nhập" class="form-control" name="username" required />
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <i class="fa-solid fa-id-card rounded-circle me-2" height="30"></i>
                            <input type="text" placeholder="Nhập mã đăng ký" class="form-control" name="id_register" required />
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <i class="fa-solid fa-phone rounded-circle me-2" height="30"></i>
                            <input type="text" placeholder="Nhập số điện thoại" class="form-control" name="phone" />
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <i class="fa-solid fa-location-dot rounded-circle me-2" height="30"></i>
                            <input type="text" placeholder="Nhập địa chỉ" class="form-control" name="address" />
                        </div>
                        <!-- email end -->

                        <!-- password begin -->
                        <div class="d-flex flex-row align-items-center mt-3 position-relative">
                            <i class="fa-solid fa-lock rounded-circle me-2" height="30"></i>
                            <div class="input-group position-relative">
                                <input type="password" placeholder="Vui lòng nhập mật khẩu" class="form-control" id="password" name="password" required />
                                <span class="input-group-text border-0 cursor-pointer position-absolute top-50 start-100 translate-middle pe-5 bg-transparent" style="background-color: #ffff; z-index: 1000;" onclick="showPassword()"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-around align-items-center my-2">
                            <button class="btn btn-primary text-white p-2" type="submit" name="create" value="Sign Up">Đăng kí</button>
                        </div>
                        <div class="d-flex justify-content-around align-items-center my-2">
                            <div class="mb-1"> Bạn đã có tài khoản? <a href="index.php" class="ps-1 text-primary underline special-link">Đăng nhập</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['create'])) {
            if ($success == 0) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Thông tin đã đăng kí trước đó
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            } else if ($success == -1) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Cần nhập đúng mã đăng kí được quản trị viên cấp
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            } else if ($success) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Chúc mừng!</strong>Bạn đã đăng ký thành công.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            }
        }
        ?>

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
    </main>
</body>

</html>