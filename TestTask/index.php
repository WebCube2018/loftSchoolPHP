<?php

echo "<pre>";

echo "������� 1".PHP_EOL;

$var1 = rand(1, 100);
$var2 = rand(1, 100);
$sum = $var1+$var2;

echo $var1." + ".$var2." = ".$sum."<br><br>";


echo "������� 2".PHP_EOL;

for ($i = 1; $i <= 10; $i++) {
    if ($i % 2) {
        echo $i." ";
    }
}
