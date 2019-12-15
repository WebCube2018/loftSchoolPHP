<?php
//Подключаем Абстрактный класс
require_once "src/CountingProcess.php";

//Подключаем дополнительные услуги
require_once "src/TraitGps.php";
require_once "src/TraitDrive.php";

//Подключаем тарифы
require_once "src/TariffBasic.php";
require_once "src/TariffHour.php";
require_once "src/TariffDay.php";
require_once "src/TariffStudent.php";

use src\TariffBasic\TariffBasic;
use src\TariffHour\TariffHour;
use src\TariffDay\TariffDay;
use src\TariffStudent\TariffStudent;

//Константы значений для вычисления в тарифах
const AGE = 25;
const KM = 4;
const MINUTES = 65;

$basic = new TariffBasic(AGE, KM, MINUTES, true);
$hour = new TariffHour(AGE, KM, MINUTES);
$day= new TariffDay(AGE, KM, MINUTES);
$student= new TariffStudent(AGE, KM, MINUTES);

echo "<pre>";

echo "Тариф Базовый Возраст: ".AGE." Км: ".KM." Минут: ".MINUTES." = ".$basic->priceBase().PHP_EOL;
echo "Тариф Часовой Возраст: ".AGE." Км: ".KM." Минут: ".MINUTES." = ".$hour->priceHour().PHP_EOL;
echo "Тариф Суточный Возраст: ".AGE." Км: ".KM." Минут: ".MINUTES." = ".$day->priceDay().PHP_EOL;
echo "Тариф Студенческий Возраст: ".AGE." Км: ".KM." Минут: ".MINUTES." = ".$student->priceStudent().PHP_EOL;

echo "</pre>";
