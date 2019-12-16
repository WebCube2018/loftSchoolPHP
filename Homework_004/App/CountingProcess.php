<?php

namespace App;

abstract class CountingProcess implements ConfigInterface
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

    //Метод проверки возраста
    protected function checkAge()
    {
        if ($this->age < self::YOUNG_AGE || $this->age > self::OLD_AGE) {
            return false;
        }
        return true;
    }

    protected function getCoefficient()
    {
        if ($this->age >= self::YOUNG_AGE && $this->age <= self::YOUNG_AGE_COEFFICIENT) {
            return self::DIVIDER_COEFFICIENT;
        }
        return self::DIVIDER_BASE_COEFFICIENT;
    }

    //Метод подсчета стоимости тарифа
    protected function priceBill()
    {
        if ($this->checkAge()) {
            return  (($this->countKM * $this->priceKM) + ($this->time * $this->priceTime)) * $this->getCoefficient();
        }
        return (string) "Уважаемый пользователь у тебя возраст не тот";
    }
}
