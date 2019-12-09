<?php

//Выполняем закза
function order($pdo, $data)
{
    $stmt = $pdo->prepare("SELECT id, email FROM users WHERE email = ? ");
    $stmt->execute([$data["email"]]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return addOrder($pdo, $data, $result);
    }
    return addUser($pdo, $data);
}

//Добавляем заказ в базу
function addOrder($pdo, $data, $result)
{
    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, comments, payment, street, house, appart, housing, floor, call_back) 
        VALUES (:userId, :comments, :payment, :street, :house, :housing, :appart, :floor, :call_back)
    ");
    $stmt->bindParam(":userId", $result["id"]);
    $stmt->bindParam(":comments", $data["comment"]);
    $stmt->bindParam(":payment", $data["payment"]);
    $stmt->bindParam(":street", $data["street"]);
    $stmt->bindParam(":house", $data["home"]);
    $stmt->bindParam(":housing", $data["part"]);
    $stmt->bindParam(":appart", $data["appt"]);
    $stmt->bindParam(":floor", $data["floor"]);
    $stmt->bindParam(":call_back", $data["callback"]);
    $stmt->execute();
    $id = $pdo->lastInsertId();

    return $id;
}

//Добавляем пользователя в БД
function addUser($pdo, $data)
{
    /* @var PDOStatement $stmt */
    $stmt = $pdo->prepare("INSERT INTO users (email, name, phone) VALUES (:email, :name, :phone)");

    $stmt->bindParam(":email", $data["email"]);
    $stmt->bindParam(":name", $data["name"]);
    $stmt->bindParam(":phone", $data["phone"]);
    $stmt->execute();
    $res["id"] = $pdo->lastInsertId();

    return addOrder($pdo, $data, $res);
}

//Получаем всех пользователей
function allUsers($pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

//Получаем все заказы
function allOrder($pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM orders");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

function sendOrder($pdo, $orderId)
{
    //Получим заказ
    $stmt = $pdo->prepare("SELECT id, user_id, street, house, appart, housing, floor FROM orders WHERE id = ? ");
    $stmt->execute([$orderId]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    //Получим кол-во заказов пользователя
    $userId = $order["user_id"];
    $stm = $pdo->prepare("SELECT COUNT(orders.user_id) AS orders_count FROM orders WHERE user_id = '$userId'");
    $stm->execute();
    $countOrders = $stm->fetch(PDO::FETCH_ASSOC);

    $file = 'orders.txt';
    $current = file_get_contents($file);

    $current .= date("Y-m-d H:i:s") . "\n";
    $current .= "Ваш заказ будет доставлен по адресу:" . " улица " . $order["street"] . " Дом " . $order["house"]
        . " Корпус " . $order["appart"] . " Квартира " . $order["housing"] . " Этаж " . $order["floor"] . "\n";
    $current .= "DarkBeefBurger за 500 рублей, 1 шт" . "\n";

    //Запишим какой это заказ пользователя
    if ($countOrders["orders_count"] == 1) {
        $countOrders["orders_count"] = "первый";
    }

    $current .= "Спасибо - это ваш " . $countOrders["orders_count"] . " заказ" . "\n\n\n";
    // Пишем содержимое  в файл
    file_put_contents($file, $current, LOCK_EX);

    $result = "Заказ № " . $order["id"] . " выполнен сообщение отправили Вам текст файл";
    return $result;
}
