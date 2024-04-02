<?php
    function check_dangnhap($username,$pass)
    {
        include "dbconnect.php";
        $sql = "call login('".$username."','".$pass."')";
        $st = $pdo->prepare($sql);
        $st->execute();
        $result = $st->setFetchMode(PDO::FETCH_ASSOC);
        $num=$st->rowCount();
        return $num;
    }
?>