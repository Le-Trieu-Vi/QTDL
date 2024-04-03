<body>
    <?php include '../components/header.php'; ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php include '../components/sidebar.php'; ?>
                <div class="offset-2 col-6 pb-5">
                    <h1 class="text-center my-4">Cập nhật thông tin giáo viên</h1>
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">
                            <h4>THÔNG TIN GIÁO VIÊN</h4>
                        </div>
                        <div class="card-body">
                            <form id="sp" class="form-horizontal" action="index.php?act=update_teacher" method="post">
                                <div class="form-group row ps-1 mb-2 ">
                                    <label class="col-sm-3 col-form-label ps-1" for="ma">Mã giáo viên</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ma" name="MaGiaoVien" placeholder="" required value="<?= $teacher['MaGiaoVien']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2 text-left">
                                    <label class="col-sm-3 col-form-label ps-1" for="ten">Họ tên giáo viên</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten" name="HoTenGiaoVien" placeholder="" required value="<?= $teacher['HoTenGiaoVien']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="sodienthoai">Số điện thoại</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="sodienthoai" name="SDT" placeholder="" required value="<?= $teacher['SoDienThoai']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="gioitinh">Giới tính</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="gioitinh" name="GioiTinh" placeholder="" required value="<?= $teacher['GioiTinh']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="namsinh">Ngày sinh</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="ngaysinh" name="NgaySinh" placeholder="" required value="<?= $teacher['NgaySinh']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group row ps-1 mb-2">
                                    <label class="col-sm-3 col-form-label ps-1" for="diachi">Địa chỉ</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="diachi" name="DiaChi" placeholder="" required value="<?= $teacher['DiaChi']; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-5 offset-sm-4 ">
                                    <button type="submit" class="btn btn-success" name="updateteacher" value="">Lưu thay đổi</button>
                                    <a href="index.php?act=teacher" class="btn btn-secondary" role="button">Trở về</a>
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