<?php 
// function get_all_students() {
//     include 'dbconnect.php';
//     $sql = "call all_students()";
//     $statement = $pdo->prepare($sql);
//     $statement->execute();
//     $students=$statement->fetchAll();
//     return $students;
// }

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

function add_student($mahocsinh, $hoten, $gioitinh, $ngaysinh, $diachi, $sdtphuhuynh, $malop) {
    include 'dbconnect.php';
    $sql = "call add_student(?,?,?,?,?,?,?,?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $mahocsinh);
    $statement->bindParam(2, $hoten);
    $statement->bindParam(3, $gioitinh);
    $statement->bindParam(4, $ngaysinh);
    $statement->bindParam(5, $diachi);
    $statement->bindParam(6, $sdtphuhuynh);
    $statement->bindParam(7, $malop);
    $statement->execute();
}

function delete_student($studentId) {
    include 'dbconnect.php';
    $sql = "call delete_student(?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $studentId);
    $statement->execute();
}
?>