<?php
namespace src\TraitGps;

trait TraitGps
{
    protected $result;

    public function priceBillGps()
    {
        $this->result = parent::priceBill();
        $this->time = ceil($this->time / self::MINUTES);
        return  $this->result + (self::SERVICES_GPS * $this->time);
    }
}
