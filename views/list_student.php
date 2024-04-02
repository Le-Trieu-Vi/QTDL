<?php
// require_once __DIR__ . '/../models/dbconnect.php';
// require_once __DIR__ . '/../models/student_model.php';
// include '../components/add_student_model.php';
$student_grades = [];
?>

<body>
  <style>
  </style>
  <?php include '../components/header.php'; ?>
  <main>
    <div class="container-fluid">
      <div class="row">
        <?php include '../components/sidebar.php'; ?>
        <div class="col-10">
          <h1 class="text-center mt-5">Danh sách học sinh</h1>
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
              if (isset($students) && (count($students) > 0)):
                foreach ($students as $key => $student): ?>
                  <tr>
                    <th scope="row"><?= $key + 1; ?></th>
                    <td><?= $student['MaHocSinh']; ?></td>
                    <td><?= $student['HoTen']; ?></td>
                    <td><?= $student['GioiTinh']; ?></td>
                    <td><?= $student['NgaySinh']; ?></td>
                    <td><?= $student['SDTPhuHuynh']; ?></td>
                    <td><?= $student['TenLop']; ?></td>
                    <td>
                      <button class='btn p-1 border-0' onclick='toggleDetails(this)'><img src='https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678110-sign-info-128.png' alt='Xem thêm' title='Xem thêm' height='25' width='25'></button>
                      <a href='index.php?art=update_student&MaHocSinh=<?= $student['MaHocSinh']; ?>' class='btn p-1 border-0'><img src='https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678134-sign-check-128.png' alt='Sửa' title='Sửa' height='25' width='25'></button></a>
                      <a href='index.php?art=delete_student&MaHocSinh=<?= $student['MaHocSinh']; ?>' class=' btn p-1 border-0'><img src='https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-128.png' alt='Xóa' title='Xóa' height='25' width='25'></button></a>
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
      // detailsRow.classList.toggle('show');
    }

    function deleteStudent(studentId) {
      if (confirm("Bạn có chắc chắn muốn xóa học sinh này không?")) {
        window.location.href = `delete_student.php?MaHocSinh=${studentId}`;
      }
    }
  </script>
</body>