<?php
// session_start();
echo var_dump( $_SESSION['studentId']);
// $detail_student = get_detail_student($_GET['MaHocSinh']);
// $student = $detail_student[0];

// Xử lý mã học sinh và trả về thông tin chi tiết của học sinh

// Kiểm tra xem yêu cầu AJAX đã được gửi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem studentId đã được gửi qua phương thức POST chưa
    if (isset($_POST['studentId'])) {
        // Lấy studentId từ dữ liệu gửi qua
        $studentId = $_POST['studentId'];
        
        // Xử lý dữ liệu tại đây, ví dụ:
        // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của học sinh có studentId tương ứng
        // Sau đó, bạn có thể trả về dữ liệu dưới dạng HTML hoặc JSON để hiển thị trên trang web
        // Ví dụ:
        $studentInfo = "Thông tin chi tiết của học sinh có mã: " . $studentId;
        echo $studentInfo;
    } else {
        // Nếu studentId không được gửi, bạn có thể trả về một thông báo lỗi hoặc xử lý khác tùy thuộc vào yêu cầu của bạn
        echo "Không có mã học sinh được gửi.";
    }
} else {
    // Nếu đây không phải là một yêu cầu POST từ AJAX, bạn có thể xử lý hoặc bỏ qua tùy thuộc vào yêu cầu của bạn
    echo "Yêu cầu không hợp lệ.";
}
?>

<div id="student-detail">
    <h1 class="text-center mt-5">Thông tin học sinh</h1>
    <div class="row">
        <div class="form-group">
            <label for="MaHocSinh">Mã học sinh</label>
            <input type="text" class="form-control" id="MaHocSinh" value="<?php echo $studentID['MaHocSinh']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="HoTen">Họ và tên</label>
            <input type="text" class="form-control" id="HoTen" value="<?php echo $studentID['HoTen']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="GioiTinh">Giới tính</label>
            <input type="text" class="form-control" id="GioiTinh" value="<?php echo $studentID['GioiTinh']; ?>" readonly>
        </div>
    </div>
</div>