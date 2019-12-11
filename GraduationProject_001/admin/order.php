<?php

require_once "../src/login.php";
require_once "../src/function.php";

try {
    $pdo = new PDO(USER_NAME, USER_NAME, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = allOrder($pdo);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}

echo "<table>";
echo "<tr><th>id</th><th>user_id</th><th>comments<th><th>payment</th><th>street</th><th>house</th><th>appart</th>
<th>housing</th><th>floor</th><th>call_back</th></tr>";

$ch = 0;
foreach ($data as $key => $user) {
    $ch ++;
    if ($ch == 1) {
        echo "<tr>";
    }
    echo "<td>".$user["id"]."</td>";
    echo "<td>".$user["user_id"]."</td>";
    echo "<td>".$user["comments"]."</td>";
    echo "<td>".$user["payment"]."</td>";
    echo "<td>".$user["street"]."</td>";
    echo "<td>".$user["house"]."</td>";
    echo "<td>".$user["appart"]."</td>";
    echo "<td>".$user["housing"]."</td>";
    echo "<td>".$user["floor"]."</td>";
    echo "<td>".$user["call_back"]."</td>";
    $ch = 0;
    if ($ch == 0) {
        echo "</tr>";
    }
}
echo "</table>";
