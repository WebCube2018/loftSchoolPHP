<?php
namespace src\TraitDrive;

trait TraitDrive
{
    protected $resultDrive;

    public function priceBillDrive()
    {
        $this->resultDrive = parent::priceBill();
        return  $this->resultDrive + self::SERVICES_DRIVE;
    }
}
