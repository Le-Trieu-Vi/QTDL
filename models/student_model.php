<?php 
function get_all_students() {
    include 'dbconnect.php';
    $sql = "call all_students()";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $students=$statement->fetchAll();
    return $students;
}

function get_detail_student($MaHocSinh) {
    include 'dbconnect.php';
    $sql = "call get_detail_student(:MaHocSinh)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':MaHocSinh', $MaHocSinh);
    $statement->execute();
    $student=$statement->fetch();
    return $student;
}


?>