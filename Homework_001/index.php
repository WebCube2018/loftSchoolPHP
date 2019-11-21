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

echo "<br><br><br>";


//Задание #4
$day = rand(1, 10);

switch ($day) {
    case 1:
        echo "Это рабочий день";
        break;
    case 2:
        echo "Это рабочий день";
        break;
    case 3:
        echo "Это рабочий день";
        break;
    case 4:
        echo "Это рабочий день";
        break;
    case 5:
        echo "Это рабочий день";
        break;
    case 6:
        echo "Это выходной день";
        break;
    case 7:
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
}

echo "<br><br><br>";


//Задание #5
$bmw = [
    "model" => "X5",
    "speed" => 120,
    "doors" => 5,
    "year" => 2015
];
$toyota = [
    "model" => "RAV4",
    "speed" => 199,
    "doors" => 5,
    "year" => 2018
];
$opel = [
    "model" => "Astra",
    "speed" => 190,
    "doors" => 5,
    "year" => 2017
];

$car["bmw"] = $bmw;
$car["toyota"] = $toyota;
$car["opel"] = $opel;

foreach ($car as $k => $value) {
    echo "CAR: ".$k."<br>";
    echo $value["model"]." ".$value["speed"]." ".$value["doors"]." ".$value["year"]."<br>";
}

echo "<br><br><br>";


//Задание #6

//стили для таблицы
echo "<style> td{height: 35px; width: 35px; border: 1px solid; text-align: center;}</style>";

echo "<table>";

for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    for ($c = 1; $c <= 10; $c++) {
        if (($i % 2) == 0 && ($c % 2) == 0) {
            echo '<td>('.$i*$c.')</td>';
        } elseif (($i % 2) != 0 && ($c % 2) != 0) {
            echo '<td>['.$i*$c.']</td>';
        }
        echo '<td>'.$i*$c.'</td>';
    }
    echo "</tr>";
}

echo "</table>";

echo "</pre>";
