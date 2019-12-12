<?php

namespace src\CountingProcess;

abstract class CountingProcess
{
    protected $age;
    protected $countKM;
    protected $time;
    protected $priceKM;
    protected $priceTime;
    protected $addition;

    public function __construct($age, $countKM, $time, $addition = false)
    {
        $this->age = $age;
        $this->countKM = $countKM;
        $this->time = $time;
        $this->addition = $addition;
    }

    protected function checkAge()
    {
        if ($this->age < 18 && $this->age > 65) {
            return false;
        } elseif ($this->age >= 18 && $this->age <= 21) {
            $this->priceKM = $this->priceKM * 0.1;
            $this->priceTime = $this->priceTime * 0.1;
            return true;
        }
        return true;
    }

    protected function priceBill()
    {
        if ($this->checkAge()) {
            return $this->countKM * $this->priceKM;
        }
        return "Уважаемый пользователь у тебя возраст не тот";
    }
}
