<?php
include '../components/header.php';
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
          <table class="table table-striped outer-table">
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
              <tr>
                <th scope="row">1</th>
                <td>HS001</td>
                <td>Nguyễn Văn A</td>
                <td>Nam</td>
                <td>01/01/2001</td>
                <td>0123456789</td>
                <td>10A1</td>
                <td>
                  <button class="btn p-1 border-0" onclick="toggleDetails(this)"><img src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678110-sign-info-128.png" alt="Xem thêm" title="Xem thêm" height="25" width="25"></button>
                  <button class="btn p-1 border-0"><img src="https://cdn1.iconfinder.com/data/icons/unicons-line-vol-3/24/file-edit-alt-128.png" alt="Chỉnh sửa" title="Chỉnh sửa" height="25" width="25"></button>
                  <button class="btn p-1 border-0"><img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-128.png" alt="Xóa" title="Xóa" height="25" width="25"></button>
                </td>
              </tr>
              <tr class="details-row" style="display: none;">
                <td colspan="8">
                  <div class="row">
                    <div class="col-12">
                      <label for="Dia chi ">Địa chỉ: 123 Đường ABC, Quận XYZ, TP. HCM</label>
                    </div>
                    <div class="col-12">
                      <label for="Giao vien chu nhiem ">Giáo viên chủ nhiệm: Nguyễn Thị B</label>
                    </div>
                    <div class="col-12 text-center">
                      <label for="Bang Diem" style="font-size: 22px; font-weight: bold;">Bảng Điểm </label>
                    </div>
                    <div class="col-12">
                      <table class="table text-center">
                        <thead>
                          <tr>
                            <td scope="col">STT</td>
                            <td scope="col">Mã môn học</td>
                            <td scope="col">Tên môn học</td>
                            <td scope="col">Điểm miệng</td>
                            <td scope="col">Điểm 15 phút</td>
                            <td scope="col">Điểm 1 tiết</td>
                            <td scope="col">Điểm thi học kỳ</td>
                            <td scope="col">Điểm trung bình</td>
                          </tr>
                        </thead>
                        <tbody class="">
                          <tr>
                            <td scope="row">1</td>
                            <td>TOAN</td>
                            <td>Toán</td>
                            <td>8</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td scope="row">2</td>
                            <td>LY</td>
                            <td>Lý</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>8</td>
                            <td>8</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </td>
              </tr>
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
  </script>

</body>