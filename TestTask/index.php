<?php

echo "<pre>";

echo "Задание 1 <br>";

$var1 = rand(1, 100);
$var2 = rand(1, 100);
$sum = $var1 + $var2;
echo $var1 . "+" . $var2 . "=" . $sum . "<br><br>";

echo "Задание 2 <br>";
for ($i = 1; $i <= 10; $i++) {
    if (($i % 2) == 0) {
        echo $i . " ";
    }
}

echo "</pre>";
