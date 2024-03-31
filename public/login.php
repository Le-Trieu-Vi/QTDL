<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "quanlyhocsinh"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if user exists
    $sql = "SELECT * FROM Users WHERE TenDangNhap = '$username' AND MatKhau = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authenticated, redirect to welcome page
        header("Location: welcome.php");
        exit();
    } else {
        // Authentication failed, display error message
        echo "Invalid username or password";
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <h2>Quản lý học sinh</h2>
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class=" my-5 col-md-7 col-lg-5 col-xl-5 border" style="background-color: #F5F5F5;">
                <h1 class="text-center fw-bold mt-5">Đăng nhập</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="d-flex flex-row align-items-center my-5">
                        <img src="https://cdn4.iconfinder.com/data/icons/buno-email/32/__email_address_contact-128.png"
                            class="rounded-cỉrcle me-2" height="30" />
                        <input type="text" placeholder="Vui lòng nhập tên đăng nhập" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="d-flex flex-row align-items-center mt-5 position-relative">
                        <img src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678115-lock-open-64.png"
                            class="rounded-cỉrcle me-2" height="30" />
                        <div class="input-group position-relative">
                            <input type="password" placeholder="Vui lòng nhập mật khẩu" class="form-control" id="password" name="password" required>
                            <span class="input-group-text border-0 cursor-pointer position-absolute top-50 start-100 translate-middle pe-5 bg-transparent" style="background-color: #ffff; z-index: 1000;" onclick="showPassword()"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="ms-5 my-3">
                        <input type="checkbox">
                        <label for="remember">Nhớ mật khẩu</label>
                    </div>
                    <div class="d-flex justify-content-around align-items-center my-4">
                        <button class="btn btn-primary text-white p-2" type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="py-3 border-top">
        <div class="text-center text-muted">
            <span>© 2024 CopyRight</span>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/f4fd0c329a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>
