<?php

function task1(array $array, $boll = false)
{
    if (!$boll) {
        return "<p>" . implode("</p><p>", $array) . "</p>";
    } else {
        return implode(",", $array);
    }
}

function task2(... $arg)
{
    $arithmetic = array_shift($arg);
    $sum = 0;

    switch ($arithmetic) {
        case "+":
            foreach ($arg as $value) {
                $sum += $value;
            }
            return implode($arithmetic, $arg) . " = " . $sum;
            break;
        case "-":
            foreach ($arg as $value) {
                $sum -= $value;
            }
            return implode($arithmetic, $arg) . " = " . $sum;
            break;
        case "*":
            $sum = 1;
            foreach ($arg as $value) {
                $sum *= $value;
            }
            return implode($arithmetic, $arg) . " = " . $sum;
            break;
        case "/":
            foreach ($arg as $value) {
                $sum /= $value;
            }
            return implode($arithmetic, $arg) . " = " . $sum;
            break;
        default:
            return "Что то не то отправили иди в код смотри";
    }
}

function task3($value1, $value2)
{
    if ($value1 > 35 || $value2 > 35) {
        echo "Число слишком большое такая партянка не к чему";
        die;
    } elseif (empty($value1) || empty($value2)) {
        echo "Вы передали какое-то число пустое в функцию";
    }

    echo "<style> td{height: 35px; width: 35px; border: 1px solid; text-align: center;}</style>";

    echo "<table>";
    for ($i = 1; $i <= $value1; $i++) {
        echo "<tr>";
        for ($c = 1; $c <= $value2; $c++) {
            echo '<td>' . $i * $c . '</td>';
        }
        echo "</tr>";
    }
    echo "</table>";
}

function task4()
{
    echo date("d.m.Y H:i") . PHP_EOL;
}

function task5($date)
{
    echo strtotime($date) . PHP_EOL;
}

function task6($replace)
{
    echo str_replace("К", "", $replace);
}

function task7($str, $serch = "Две", $rep = "“Три”")
{
    echo str_replace($serch, $rep, $str);
}

function task8($content)
{
    file_put_contents("test.txt", $content);
}

function task9($fileName)
{
    file_get_contents($fileName);
}
