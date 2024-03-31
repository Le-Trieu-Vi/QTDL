<?php
require_once __DIR__ . '/../models/dbconnect.php';
require_once __DIR__ . '/../models/student_model.php';
include '../components/add_student_model.php';
$students = [];
$students = get_all_students();
?>

<body>
  <?php include '../components/header.php'; ?>
  <main>
    <div class="container-fluid">
      <div class="row">
        <?php include '../components/sidebar.php'; ?>
        <div class="col-10">
          <h1 class="text-center mt-5">Danh sách học sinh</h1>

          <div id="modalContainer"></div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã học sinh</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <!-- <th scope="col">Địa chỉ</th> -->
                <th scope="col">SĐT Phụ huynh</th>
                <th scope="col">Lớp</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($students) && (count($students) > 0)) {
                $i = 1;
                foreach ($students as $student) {
                  echo "<tr>";
                  echo "<th scope='row'>$i</th>";
                  echo "<td>{$student['MaHocSinh']}</td>";
                  echo "<td>{$student['HoTen']}</td>";
                  echo "<td>{$student['GioiTinh']}</td>";
                  echo "<td>{$student['NgaySinh']}</td>";
                  // echo "<td>{$student['DiaChi']}</td>";
                  echo "<td>{$student['SDTPhuHuynh']}</td>";
                  echo "<td>{$student['MaLop']}</td>";
                  echo "<td>";
                  echo "<button type='button' class='btn p-1 border-0 info-btn'data-student-id='{$student['MaHocSinh']}' data-toggle='collapse' data-target='#demo1'><img src='https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678110-sign-info-128.png' alt='Xem thêm' title='Xem thêm' height='25' width='25'></button>";
                  echo "<button class='btn p-1 border-0'><img src='https://cdn1.iconfinder.com/data/icons/unicons-line-vol-3/24/file-edit-alt-128.png' alt='Chỉnh sửa' title='Chỉnh sửa' height='25' width='25'></button>";
                  echo "<button class='btn p-1 border-0'><img src='https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-128.png' alt='Xóa' title='Xóa' height='25' width='25'></button>";
                  echo "</td>";
                  echo "</tr>";
                  $i++;
                  echo "<div id='demo1' class='collapse'>";
                  echo "<p class='item-collapse'><i class='fa-solid fa-reply'></i> Được. Chúng tôi chấp nhận việc chi trả qua PayPal.</p";
                  echo "</div>";
                }
              }
              ?>
            </tbody>
          </table>
          <?php include '../components/detail_student.php'; ?>
          <div class="mt-4">
            <button type="button" class="btn collapses" data-toggle="collapse" data-target="#demo1">1. Tôi có
              thể trả
              tiền thông qua PayPal?</button>
            <div id="demo1" class="collapse">
              <p class="item-collapse"><i class="fa-solid fa-reply"></i> Được. Chúng tôi chấp nhận việc chi trả qua PayPal.</p>
            </div>
          </div>
        </div>
      </div>
  </main>
  <?php include '../components/footer.php'; ?>

  <script>
    $(document).on('click', '.info-btn', function() {
      var studentId = $(this).data('student-id'); // Lấy mã học sinh từ thuộc tính data
      // Gửi mã học sinh bằng AJAX đến một tệp PHP để xử lý
      $.ajax({
        url: '../views/detail_student.php',
        method: 'POST',
        data: {
          studentId: studentId
        },
        success: function(response) {

          // Xử lý phản hồi từ server
          // Ví dụ: Hiển thị thông tin chi tiết học sinh
          alert(response);
        }
      });
    });
  </script>
</body>

</html>