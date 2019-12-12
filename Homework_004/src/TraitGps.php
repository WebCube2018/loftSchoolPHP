<?php
namespace src\TraitGps;

use src\CountingProcess\CountingProcess;

trait TraitGps
{

    public function priceBill(CountingProcess $countingProcess)
    {
        $result =  $countingProcess->priceBill();
        $countingProcess->time = $countingProcess->time / 60;
        return $countingProcess->time * 15 + $result;
    }
}
