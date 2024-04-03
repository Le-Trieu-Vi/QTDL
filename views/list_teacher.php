<?php
include '../models/add_student_model.php';
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
          <h1 class="text-center mt-5">Danh sách giáo viên</h1>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã giáo viên</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Lớp chủ nhiệm</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($teachers) && (count($teachers) > 0)) :
                foreach ($teachers as $key => $teacher) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1; ?></th>
                    <td><?= $teacher['MaGiaoVien']; ?></td>
                    <td><?= $teacher['HoTenGiaoVien']; ?></td>
                    <td><?= $teacher['GioiTinh']; ?></td>
                    <td><?= $teacher['NgaySinh']; ?></td>
                    <td><?= $teacher['DiaChi']; ?></td>
                    <td><?= $teacher['SoDienThoai']; ?></td>
                    <td><?= $teacher['TenLop']; ?></td>

                    <td>
                      <a href="index.php?act=update_student&MaHocSinh=<?= $student['MaHocSinh']; ?>" type="button" class="btn p-0">
                        <img src='https://cdn1.iconfinder.com/data/icons/unicons-line-vol-3/24/edit-128.png' alt='Sửa' title='Sửa' height='25' width='25'></button>
                      </a>
                      <a href='index.php?act=del_student&MaHocSinh=<?= $student['MaHocSinh']; ?>' onclick="return confirmDelete()" class=' btn p-1 border-0'><img src='https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-128.png' alt='Xóa' title='Xóa' height='25' width='25'></button></a>
                    </td>
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