<?php
session_start();

require_once __DIR__ . '/../models/dbconnect.php';
require_once __DIR__ . '/../models/login_model.php';
require_once __DIR__ . '/../models/search_model.php';
require_once __DIR__ . '/../models/student_model.php';
require_once __DIR__ . '/../models/teacher_model.php';
// include '../components/header.php';



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
        if (isset($_POST['search_hs']) && ($_POST['search'])) {
          $tukhoa = $_POST['search'];
          $students = search_student($tukhoa);
        } else {
          $students = get_all_students();
        }
        include '../views/list_student.php';
        break;
      case 'update_student':
        if (isset($_GET['MaHocSinh'])) {
          $mahocsinh = $_GET['MaHocSinh'];
          $student = get_one_student($mahocsinh);
        }
        if (isset($_POST['updatestudent'])) {
          $mahocsinh = $_POST['MaHocSinh'];
          $hoten = $_POST['HoTen'];
          $malop = $_POST['MaLop'];
          $sdtphuhuynh = $_POST['SDTPhuHuynh'];
          $gioitinh = $_POST['GioiTinh'];
          $ngaysinh = $_POST['NgaySinh'];
          $diachi = $_POST['DiaChi'];
          update_student($mahocsinh, $hoten, $gioitinh, $ngaysinh, $diachi, $sdtphuhuynh, $malop);
          $student = get_one_student($mahocsinh);
          echo "<script>alert('Cập nhật học sinh thành công!');</script>";
        }
        include '../views/list_student.php';
        break;
      case 'add_student':
        if (isset($_POST['addstudent'])) {
          $mahocsinh = $_POST['mahocsinh'];
          $hoten = $_POST['hoten'];
          $gioitinh = $_POST['gioitinh'];
          $ngaysinh = $_POST['ngaysinh'];
          $diachi = $_POST['diachi'];
          $sdtphuhuynh = $_POST['sdtphuhuynh'];
          $malop = $_POST['malop'];
          add_student($mahocsinh, $hoten, $gioitinh, $ngaysinh, $diachi, $sdtphuhuynh, $malop);
          echo "<script>alert('Thêm học sinh thành công!');</script>";
        }
        $students = get_all_students();
        include '../views/list_student.php';
        break;
      case 'del_student':
        if (isset($_GET['MaHocSinh'])) {
          $mahocsinh = $_GET['MaHocSinh'];
          delete_student($mahocsinh);
          echo "<script>alert('Xóa học sinh thành công!');</script>";
        }
        $students = get_all_students();
        include '../views/list_student.php';
        break;
      case 'teacher':
        $teachers = get_all_teachers();
        include '../views/list_teacher.php';
        break;
      case 'update_teacher':
        if (isset($_GET['MaGiaoVien'])) {
          $magiaovien = $_GET['MaGiaoVien'];
          $teacher = get_one_teacher($magiaovien);
        }
        if (isset($_POST['updateteacher'])) {
          $magiaovien = $_POST['MaGiaoVien'];
          $hotengiaovien = $_POST['HoTenGiaoVien'];
          $sdt= $_POST['SDT'];
          $gioitinh = $_POST['GioiTinh'];
          $ngaysinh = $_POST['NgaySinh'];
          $diachi = $_POST['DiaChi'];
          update_teacher($magiaovien, $hotengiaovien, $gioitinh, $ngaysinh, $diachi, $sdt);
          $teacher = get_one_teacher($magiaovien);
          echo "<script>alert('Cập nhật giáo viên thành công!');</script>";
        }
        include '../views/list_teacher.php';
        break;
      case 'add_teacher':
        if (isset($_POST['addteacher'])) {
          $magiaovien = $_POST['magiaovien'];
          $hotengiaovien = $_POST['hotengiaovien'];
          $gioitinh = $_POST['gioitinh'];
          $ngaysinh = $_POST['ngaysinh'];
          $diachi = $_POST['diachi'];
          $sdt = $_POST['sdt'];
          add_teacher($magiaovien, $hotengiaovien, $gioitinh, $ngaysinh, $diachi, $sdt);
          echo "<script>alert('Thêm giáo viên sinh thành công!');</script>";
        }
        $teachers = get_all_teachers();
        include '../views/list_teacher.php';
        break;
      case 'del_teacher':
        if (isset($_GET['MaGiaoVien'])) {
          $magiaovien = $_GET['MaGiaoVien'];
          delete_teacher($magiaovien);
          echo "<script>alert('Xóa giáo viên thành công!');</script>";
        }
        $teachers = get_all_teachers();
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
