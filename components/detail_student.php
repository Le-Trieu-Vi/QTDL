<?php
    // $detail_student = get_detail_student($_GET['MaHocSinh']);
    // $student = $detail_student[0];
    echo var_dump($studentID);
?>

<div id="student-detail">
    <h1 class="text-center mt-5">Thông tin học sinh</h1>
    <div class="row">
        <div class="form-group">
            <label for="MaHocSinh">Mã học sinh</label>
            <input type="text" class="form-control" id="MaHocSinh" value="<?php echo $student['MaHocSinh']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="HoTen">Họ và tên</label>
            <input type="text" class="form-control" id="HoTen" value="<?php echo $student['HoTen']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="GioiTinh">Giới tính</label>
            <input type="text" class="form-control" id="GioiTinh" value="<?php echo $student['GioiTinh']; ?>" readonly>
        </div>
    </div>
</div>