<?php
session_start();

require_once __DIR__ . '/../models/dbconnect.php';
require_once __DIR__ . '/../models/student_model.php';
require_once __DIR__ . '/../models/login_model.php';
require_once __DIR__ . '/../models/search_model.php';



if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $check = check_dangnhap($username, $pass);
  if ($check == 1) {
    $_SESSION["loged"] = true;
    $_GET['act'] = 'student';
  } else {
    echo '<script>alert("Đăng nhập không thành công tài khoản hoặc mật khẩu không chính xác");';
    echo 'window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
  }
}
if (isset($_POST['dangxuat']) && ($_POST['dangxuat'])) {
  $_SESSION["loged"] = false;
  //include "view/dangnhap.php";
}

if ((isset($_SESSION["loged"])) && ($_SESSION["loged"] == true)) {
  if (isset($_GET['act'])) {
    switch ($_GET['act']) {
      case 'student':
        if (isset($_POST['search']) && ($_POST['search'])) {
          $tukhoa = $_POST['tukhoa'];
          $students = search_hocsinh($tukhoa);
        } else {
          $students = get_all_students();
        }
        include '../views/list_student.php';
        break;
      case 'delete_student':
        if (isset($_GET['MaHocSinh'])) {
          $mahocsinh = $_GET['MaHocSinh'];
          delete_student($mahocsinh);
        }
        $students = get_all_students();
        include '../views/list_student.php';
        break;
      case 'teacher':
        include '../views/list_teacher.php';
        break;
      default:
        include ''; // 404
        break;
    }
  }
} else {
  include './login.php';
}
