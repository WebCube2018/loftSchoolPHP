<?php
namespace App;

interface ConfigInterface
{
    //Возрасты для проверки
    const YOUNG_AGE = 18;
    const YOUNG_AGE_COEFFICIENT = 21;
    const OLD_AGE = 65;

    //Делитель для молодежного коэффициента
    const DIVIDER_COEFFICIENT = 1.1;
    const DIVIDER_BASE_COEFFICIENT = 1;

    //Кол-во минут в часе
    const MINUTES = 60;

    //Дополнительные услуги
    const SERVICES_GPS = 15;
    const SERVICES_DRIVE = 100;
}
