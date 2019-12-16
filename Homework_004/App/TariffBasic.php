<?php

namespace App;

class TariffBasic extends CountingProcess
{
    protected $priceKM = 10;
    protected $priceTime = 3;

    use TraitGps;

    public function priceBase()
    {
        if ($this->addition && $this->checkAge()) {
            return $this->priceBillGps($this->priceBill());
        }
        return $this->priceBill();
    }
}
