<?php

namespace src\CountingProcess;

abstract class CountingProcess
{
    //Возрасты для проверки
    private const YOUNG_AGE = 18;
    private const YOUNG_AGE_COEFFICIENT = 21;
    private const OLD_AGE = 65;

    //Делитель для молодежного коэффициента
    private const DIVIDER_COEFFICIENT = 0.1;

    //Кол-во минут в часе
    protected const MINUTES = 60;

    //Дополнительные услуги
    protected const SERVICES_GPS = 15;
    protected const SERVICES_DRIVE = 100;

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
        } elseif ($this->age >= self::YOUNG_AGE && $this->age <= self::YOUNG_AGE_COEFFICIENT) {
            $this->priceKM = ($this->priceKM * self::DIVIDER_COEFFICIENT) + $this->priceKM;
            $this->priceTime = ($this->priceTime * self::DIVIDER_COEFFICIENT) + $this->priceTime;
            return true;
        }
        return true;
    }

    //Метод подсчета стоимости тарифа
    protected function priceBill()
    {
        if ($this->checkAge()) {
            return  ($this->countKM * $this->priceKM) + ($this->time * $this->priceTime);
        }
        return (string) "Уважаемый пользователь у тебя возраст не тот";
    }
}
