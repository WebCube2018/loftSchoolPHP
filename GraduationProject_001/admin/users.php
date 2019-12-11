<?php

require_once "../src/login.php";
require_once "../src/function.php";

try {
    $pdo = new PDO(USER_NAME, USER_NAME, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = allUsers();
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}

echo "<table>";
echo "<tr><th>id</th><th>email</th><th>name<th><th>Phone</th></tr>";

$ch = 0;
foreach ($data as $key => $user) {
    $ch ++;
    if ($ch == 1) {
        echo "<tr>";
    }
        echo "<td>".$user["id"]."</td>";
        echo "<td>".$user["email"]."</td>";
        echo "<td>".$user["name"]."</td>";
        echo "<td>".$user["phone"]."</td>";
    $ch = 0;
    if ($ch == 0) {
        echo "</tr>";
    }
}
echo "</table>";
