<?php

namespace src\TariffDay;

use src\CountingProcess\CountingProcess;
use src\TraitDrive\TraitDrive;
use src\TraitGps\TraitGps;

class TariffDay extends CountingProcess
{
    protected $priceKM = 1;
    protected $priceTime = 1000;

    //Условия для тарифа суточный
    private const MINUTES_CONDITION = 30;
    private const MINUTES_DAY = 1440;
    private const DAY_COEFFICIENT = 1;

    use TraitDrive;
    use TraitGps;

    public function priceDay()
    {
        if ($this->time % self::MINUTES > self::MINUTES_CONDITION) {
            $this->time = floor($this->time / self::MINUTES_DAY);
            $this->time += self::DAY_COEFFICIENT;
        } else {
            $this->time = floor($this->time / self::MINUTES_DAY);
        }

        if ($this->addition) {
            return $this->priceBillDrive() + $this->priceBillGps();
        }

        return $this->priceBill();
    }
}
