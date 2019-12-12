<?php

namespace src\TariffStudent;

use src\CountingProcess\CountingProcess;

class TariffStudent extends CountingProcess
{
    //Ограничение возраста для тарифа студентчиский
    private const AGE_STUDENT = 25;

    protected $priceKM = 4;
    protected $priceTime = 1;

    public function priceStudent()
    {
        if ($this->age <= self::AGE_STUDENT) {
            return $this->priceBill();
        }
        return "Данный тариф Вам не подходит по возрасту";
    }
}
