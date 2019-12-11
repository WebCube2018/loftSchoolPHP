<?php

require_once "confPDO.php";
require_once "function.php";

$data = connect();


//Если заказ добавлен отправим письмо
if ($data) {
    $res = sendOrder((int)$data["order"]);
    echo $res;
}
