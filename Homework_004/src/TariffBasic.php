<?php

namespace src\TariffBasic;

use src\CountingProcess\CountingProcess;

class TariffBasic extends CountingProcess
{
    protected $priceKM = 10;
    protected $priceTime = 3 / self::MINUTES;

    public function priceBase()
    {
        return $this->priceBill();
    }
}
