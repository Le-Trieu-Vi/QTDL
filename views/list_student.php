<?php
include '../models/add_student_model.php';
$student_grades = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/style.css">
  <script src="funciton.php"></script>
  <script src="https://kit.fontawesome.com/f4fd0c329a.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
  <?php include '../components/header.php'; ?>
  <main>
    <div class="container-fluid mt-5">
      <div class="row">
        <?php include '../components/sidebar.php'; ?>
        <div class="col-10">
          <h1 class="text-center">Danh sách học sinh</h1>
          <div class="d-flex justify-content-end" mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <form class="d-flex m-2 " method="post" action="index.php?act=student">
              <input class="form-control me-2" name="search" style="width: 500px;" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-light me-2" name="search_hs" value="Find" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              <div class="thongke">
                <button type="submit" class="btn btn-light border border-1" name="thongke">Thống kê</button>
              </div>
            </form>
            <button type="button" class="d-flex m-2 btn btn-light border border-1" style=" width: 140px" data-bs-toggle="modal" data-bs-target="#addStudentModal">Thêm học sinh</button>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã học sinh</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">SĐT Phụ huynh</th>
                <th scope="col">Lớp</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($students) && (count($students) > 0)) :
                foreach ($students as $key => $student) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1; ?></th>
                    <td><?= $student['MaHocSinh']; ?></td>
                    <td><?= $student['HoTen']; ?></td>
                    <td><?= $student['GioiTinh']; ?></td>
                    <td><?= $student['NgaySinh']; ?></td>
                    <td><?= $student['SDTPhuHuynh']; ?></td>
                    <td><?= $student['MaLop']; ?></td>
                    <td>
                      <button class='btn p-1 border-0' onclick='toggleDetails(this)'><img src='https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678110-sign-info-128.png' alt='Xem thêm' title='Xem thêm' height='25' width='25'></button>
                      <a href='index.php?act=update_student&MaHocSinh=<?= $student['MaHocSinh']; ?>' class='btn p-1 border-0'><img src='https://cdn1.iconfinder.com/data/icons/unicons-line-vol-3/24/edit-128.png' alt='Sửa' title='Sửa' height='25' width='25'></button></a>
                      <a href='index.php?act=del_student&MaHocSinh=<?= $student['MaHocSinh']; ?>' onclick="return confirmDelete()" class=' btn p-1 border-0'><img src='https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-128.png' alt='Xóa' title='Xóa' height='25' width='25'></button></a>
                    </td>
                  </tr>

                  <div>
                    <tr style='display: none;'>
                      <td colspan='8' class="p-0 border-0">
                        <div class='container-fluid p-0'>
                          <div class='row m-0'>
                            <div class='col-12 pt-3'>
                              <label for='Dia chi '>Địa chỉ: <?= $student['DiaChi']; ?></label>
                            </div>
                            <div class='col-12'>
                              <label for='Giao vien chu nhiem '>Giáo viên chủ nhiệm: <?= $student['HoTenGiaoVien']; ?></label>
                            </div>
                            <div class='col-12 text-center'>
                              <label for='Bang Diem' style='font-size: 22px; font-weight: bold;'>Bảng Điểm </label>
                            </div>
                            <div class='col-12 text-center px-0'>
                              <div class='row'>
                                <div class='col-1 px-0 mx-0'>Mã môn</div>
                                <div class='col-1 px-0 mx-0'>Tên môn</div>
                                <div class='col-2 px-0 mx-0'>Điểm miệng</div>
                                <div class='col-2 px-0 mx-0'>Điểm 15 phút</div>
                                <div class='col-2 px-0 mx-0'>Điểm 1 tiết</div>
                                <div class='col-2 px-0 mx-0'>Điểm thi học kỳ</div>
                                <div class='col-2 px-0 mx-0'>Điểm trung bình</div>
                              </div>
                              <?php
                              $student_grades = get_grade($student['MaHocSinh']);
                              foreach ($student_grades as $student_grade) :
                              ?>
                                <div class='row'>
                                  <div class='col-1 px-0 mx-0'><?= $student_grade['MaMonHoc'] ?></div>
                                  <div class='col-1 px-0 mx-0'><?= $student_grade['TenMonHoc'] ?></div>
                                  <div class='col-2 px-0 mx-0'><?= $student_grade['DiemMieng'] ?></div>
                                  <div class='col-2 px-0 mx-0'><?= $student_grade['Diem15Phut'] ?></div>
                                  <div class='col-2 px-0 mx-0'><?= $student_grade['Diem1Tiet'] ?></div>
                                  <div class='col-2 px-0 mx-0'><?= $student_grade['DiemHocKy'] ?></div>
                                  <div class='col-2 px-0 mx-0'><?= $student_grade['DiemTrungBinh'] ?></div>
                                </div>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        </div>
                      <td>
                    </tr>
                  </div>
                  </tr>
              <?php endforeach;
              endif;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php include '../components/footer.php'; ?>
  <script>
    function toggleDetails(button) {
      var detailsRow = button.parentElement.parentElement.nextElementSibling;
      detailsRow.style.display = detailsRow.style.display === "none" ? "table-row" : "none";
    }

    function confirmDelete() {
      return confirm('Bạn có chắc muốn xóa học sinh này không?');
    }
  </script>
</body>