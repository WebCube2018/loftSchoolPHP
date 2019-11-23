<?php

require "src/functions.php";

echo "<pre>";


//Задание 1
echo "<h2>Задание 1</h2>";
$array = ["hi", "word", "php", "js", "html", "css"];
echo task1($array, true);
echo "<br><br><br>";


//Задание 2
echo "<h2>Задание 2</h2>";
echo task2("+", 1, 23, 55, 10, 11);
echo "<br><br><br>";


//Задание 3
echo "<h2>Задание 3</h2>";
echo task3(10, 10);
echo "<br><br><br>";


//Задание 4
echo "<h2>Задание 4</h2>";
task4();
task5("24.02.2016 00:00:00");
echo "<br><br><br>";


//Задание 5
echo "<h2>Задание 5</h2>";
task6("Карл у Клары украл Кораллы");
task7("Две бутылки лимонада", "Две", "Три");
echo "<br><br><br>";


//Задание 6
echo "<h2>Задание 6</h2>";
task8("Hello again!");
task9("test.txt");
echo "<br><br><br>";


echo "</pre>";
