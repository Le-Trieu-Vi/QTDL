<?php
function get_all_teachers()
{
    include 'dbconnect.php';
    $sql = "call get_all_teachers()";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $teachers = $statement->fetchAll();
    return $teachers;
}

function get_teacher_class($magiaovien)
{
    include 'dbconnect.php';
    $sql = "call get_teacher_class(" . $magiaovien . ")";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $classes = $statement->fetchAll();
    return $classes;
}

function get_one_teacher($magiaovien)
{
    include 'dbconnect.php';
    $sql = "call get_one_teacher('" . $magiaovien . "')";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $teacher = $statement->fetch();
    return $teacher;
}

function update_teacher($magiaovien, $hotengiaovien, $gioitinh, $ngaysinh, $diachi, $sdt)
{
    include 'dbconnect.php';
    $sql = "call update_teacher('" . $magiaovien . "', '" . $hotengiaovien . "', '" . $gioitinh . "', '" . $ngaysinh . "', '" . $diachi . "', '" . $sdt . "')";
    $pdo->exec($sql);
}

function add_teacher($magiaovien, $hotengiaovien, $gioitinh, $ngaysinh, $diachi, $sdt)
{   
    include 'dbconnect.php';
    $sql = "call add_teacher('" . $magiaovien . "', '" . $hotengiaovien . "', '" . $gioitinh . "', '" . $ngaysinh . "', '" . $diachi . "', '" . $sdt . "')";
    var_dump($sql);
    $pdo->exec($sql);
}

function delete_teacher($magiaovien)
{
    include 'dbconnect.php';
    $sql = "call delete_teacher('" . $magiaovien . "')";
    $pdo->exec($sql);
}
