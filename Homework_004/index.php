<?php

use src\TariffBasic\TariffBasic;

$tariff = new TariffBasic(18, 5, 3);
#---------------------------НАЧАЛО ОТЛАДКА---------------------------#
echo "<pre>";
var_dump($tariff->priceBase());
echo "</pre>";
#---------------------------КОНЕЦ ОТЛАДКА----------------------------#
