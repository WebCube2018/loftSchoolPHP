<?php

namespace src\TariffStudent;

use src\CountingProcess\CountingProcess;
use src\TraitGps\TraitGps;

class TariffStudent extends CountingProcess
{
    //Ограничение возраста для тарифа студентчиский
    private const AGE_STUDENT = 25;

    protected $priceKM = 4;
    protected $priceTime = 1;

    use TraitGps;

    public function priceStudent()
    {
        if ($this->age <= self::AGE_STUDENT) {
            if ($this->addition) {
                return $this->priceBillGps();
            }

            return $this->priceBill();
        }
        return "Данный тариф Вам не подходит по возрасту";
    }
}
