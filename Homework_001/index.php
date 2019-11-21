<?php

echo "<pre>";
//Задание #1

$name = "Andrei";
$age = 26;
echo "\"Меня зовут: ".$name."\"".PHP_EOL;
echo "\"Мне: ".$age." лет\"".PHP_EOL;
echo  "\"!|/'\"\\";

echo "<br><br><br>";


//Задание #2

const IMAGE = 80;
const FELT_PEN = 23;
const PENCIL = 40;

echo "Всего рисунков: ".IMAGE." из них выполнены фломастерами: ".FELT_PEN." карандашами: ".PENCIL.", а остальные — 
красками. Сколько рисунков, выполненные красками ?".PHP_EOL;
$sum = IMAGE-(FELT_PEN+PENCIL);
echo IMAGE." - (".PENCIL." + ".FELT_PEN.") = ".$sum;

echo "<br><br><br>";


//Задание #3
$age = rand(1, 100);
if ($age >= 18 && $age <= 65) {
    echo "Вам еще работать и работать";
} elseif ($age >= 65) {
    echo "Вам пора на пенсию";
} elseif ($age >= 1 && $age <= 17) {
    echo "Вам ещё рано работать";
} else {
    echo "Неизвестный возраст";
}

echo "</pre>";
