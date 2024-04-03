    <!-- Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addStudentModalLabel">Thêm giáo viên</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?act=add_teacher" method="POST">
                        <div class="mb-3">
                            <label for="id" class="form-label">Mã giáo viên</label>
                            <input type="text" class="form-control" name="magiaovien">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="hotengiaovien">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Giới tính</label>
                            <input type="text" class="form-control" name="gioitinh">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" name="ngaysinh">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="diachi">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" name="addteacher" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>