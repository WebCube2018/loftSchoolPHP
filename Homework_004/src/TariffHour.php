<?php

namespace src\TariffHour;

use src\CountingProcess\CountingProcess;
use src\TraitDrive\TraitDrive;
use src\TraitGps\TraitGps;

class TariffHour extends CountingProcess
{
    protected $priceKM = 0;
    protected $priceTime = 200;

    use TraitDrive;
    use TraitGps;

    public function priceHour()
    {
        $this->time = ceil($this->time / self::MINUTES);
        if ($this->addition && $this->checkAge()) {
            return $this->priceBillDrive() + $this->priceBillGps();
        }
        return $this->priceBill();
    }
}
