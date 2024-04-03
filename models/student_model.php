<?php 
function get_all_students() {
    include 'dbconnect.php';
    $sql = "call get_all_student()";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $students=$statement->fetchAll();
    return $students;
}

function get_grade($studentId) {
    include 'dbconnect.php';
    $sql = "call get_grade(?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $studentId);
    $statement->execute();
    $student_grade=$statement->fetchAll();
    return $student_grade;
}

function get_one_student($studentId) {
    include 'dbconnect.php';
    $sql = "call get_one_student('" . $studentId . "')";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $student=$statement->fetch();
    return $student;
}

function add_student($mahocsinh, $hoten, $gioitinh, $ngaysinh, $diachi, $sdtphuhuynh, $malop) {
    include 'dbconnect.php';
    $sql = "call add_student('".$mahocsinh."', '".$hoten."', '".$gioitinh."', '".$ngaysinh."', '".$diachi."', '".$sdtphuhuynh."', '".$malop."')";
    $pdo->exec($sql);
}

function update_student($mahocsinh, $hoten, $gioitinh, $ngaysinh, $diachi, $sdtphuhuynh, $malop) {
    include 'dbconnect.php';
    $sql = "call update_student('".$mahocsinh."', '".$hoten."', '".$gioitinh."', '".$ngaysinh."', '".$diachi."', '".$sdtphuhuynh."', '".$malop."')";
    $pdo->exec($sql);
}

function delete_student($studentId) {
    include 'dbconnect.php';
    $sql = "call delete_student('" . $studentId . "')";
    $pdo->exec($sql);
}
?>