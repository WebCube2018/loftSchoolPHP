<?php

require_once "login.php";
require_once "function.php";

try {
    $pdo = new PDO($hostName, $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = order($pdo, $_POST);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}

//Если заказ добавлен отправим письмо
if ($data) {
    $res = sendOrder($pdo, (int)$data);
    echo $res;
}
