<?php

namespace src\TariffHour;

use src\CountingProcess\CountingProcess;

class TariffHour extends CountingProcess
{
    protected $priceKM = 0;
    protected $priceTime = 200;

    public function priceHour()
    {
        $this->time = ceil($this->time / self::MINUTES);
        return $this->priceBill();
    }
}
