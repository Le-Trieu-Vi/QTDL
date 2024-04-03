<body>
    <?php include '../components/header.php'; ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php include '../components/sidebar.php'; ?>
                <div class="offset-2 col-6 pb-5">
                    <h1 class="text-center my-4">Cập nhật thông tin học sinh</h1>
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">
                            <h4>THÔNG TIN HỌC SINH</h4>
                        </div>
                        <div class="card-body">
                            <form id="sp" class="form-horizontal" action="index.php?act=update_student" method="post">
                                <div class="form-group row ps-1 mb-2 ">
                                    <label class="col-sm-3 col-form-label ps-1" for="ma">Mã học sinh</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ma" name="MaHocSinh" placeholder="" required value="<?= $student['MaHocSinh']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2 text-left">
                                    <label class="col-sm-3 col-form-label ps-1" for="ten">Tên học sinh</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten" name="HoTen" placeholder="" required value="<?= $student['HoTen']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="ten">Mã Lớp</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten" name="MaLop" placeholder="" required value="<?= $student['MaLop']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="sodienthoai">SDT PH</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="sodienthoai" name="SDTPhuHuynh" placeholder="" required value="<?= $student['SDTPhuHuynh']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="gioitinh">Giới tính</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="gioitinh" name="GioiTinh" placeholder="" required value="<?= $student['GioiTinh']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="namsinh">Ngày sinh</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="ngaysinh" name="NgaySinh" placeholder="" required value="<?= $student['NgaySinh']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="diachi">Địa chỉ</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="diachi" name="DiaChi" placeholder="" required value="<?= $student['DiaChi']; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-5 offset-sm-4 ">
                                    <button type="submit" class="btn btn-success" name="updatestudent" value="">Lưu thay đổi</button>
                                    <a href="index.php?act=student" class="btn btn-secondary" role="button">Trở về</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
    <?php include '../components/footer.php'; ?>
</body>