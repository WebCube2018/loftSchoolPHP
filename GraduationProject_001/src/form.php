<?php

require_once "login.php";
require_once "function.php";

$data = PDO($hostName, $userName, $password, $_POST);

//Если заказ добавлен отправим письмо
if ($data) {
    $res = sendOrder($data["pdo"], (int)$data["order"]);
    echo $res;
}
