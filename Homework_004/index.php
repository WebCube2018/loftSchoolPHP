<?php
//Автолоадер
spl_autoload_register(function ($className) {
    $className = str_replace("\\", "/", $className);
    require_once "".$className.".php";
});

use App\TariffBasic;
use App\TariffHour;
use App\TariffDay;
use App\TariffStudent;

//Константы значений для вычисления в тарифах
const AGE = 21;
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
