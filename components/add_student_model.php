<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm học sinh</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="id" class="form-label">Mã học sinh</label>
                            <input type="text" class="form-control" id="id">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="namespace" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Giới tính</label>
                            <input type="text" class="form-control" id="gender">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="date">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">SĐT Phụ huynh</label>
                            <input type="number" class="form-control" id="number">
                        </div>
                        <div class="mb-3">
                            <label for="idclass" class="form-label">Mã Lớp</label>
                            <input type="text" class="form-control" id="idclass">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button type="button" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <main>
        <div class="container-fluid">
            <div class="row">
                <div class="side-bar col-2 mt-5">
                    <ul class="list-group">
                        <li class="list-group-item">Danh sách học sinh</li>
                        <li class="list-group-item">Thêm học sinh</li>
                        <li class="list-group-item">Danh sách lớp</li>
                        <li class="list-group-item">Thêm lớp</li>
                    </ul>
                </div>

                <div class="col-9 pb-5">
                    <h1 class="text-center mt-5">Thêm học sinh</h1>
                    <form class="mt-5 mx-5 px-5">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Ngày sinh</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">SĐT Phụ huynh</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mã Lớp</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                        <button class="btn btn-danger" type="reset">Hủy</button>
                    </form>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Họ và tên</label>
                      </div>
                      <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Ngày sinh</label>
                      </div>
                             
                </div>   
            </div>
      </main> -->
</body>

</html>