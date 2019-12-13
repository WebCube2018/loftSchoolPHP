<?php
namespace src\TraitGps;

use src\CountingProcess\CountingProcess;

trait TraitGps
{
    public function priceBill(CountingProcess $countingProcess)
    {
        $result =  $countingProcess->priceBill();
        $countingProcess->time = $countingProcess->time / $countingProcess::MINUTES;
        return $countingProcess->time * $countingProcess::SERVICES_GPS + $result;
    }
}
