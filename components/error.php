<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=qlyhocsinh', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error_message = 'Không thể kết nối đến CSDL';
    $reason = $e->getMessage();
    $error_message ??= 'Đã có lỗi xảy ra';
    $error = "<p class=\"error\">$error_message";
    $error .= isset($reason) ? " vì:<br>$reason</p>" : "</p>";
    $error .= isset($query) ? "<p>Câu truy vấn là: {$query}</p>" : '';
    echo $error;
}