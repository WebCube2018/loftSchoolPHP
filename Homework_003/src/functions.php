<?php

function task1()
{
    $data = file_get_contents("./data.xml");
    $xml = new SimpleXMLElement($data);

    $i = 0;
    $content ="";
    foreach ($xml->Address as $value) {
        $i++;
        if (($i % 2) == 0) {
            $content .= "<hr>";
        }
        $content .= "Type = ".$value->attributes()->Type->__toString();
        foreach ($value as $key => $value) {
            $content .= $key." - ".$value[0]."<br>";
        }
    }

    $content2 ="";
    foreach ($xml->Items->Item as $value) {
        $i++;
        if (($i % 2) == 0) {
            $content2 .= "<hr>";
        }
        $content2 .= "PartNumber = ".$value->attributes()->PartNumber->__toString()."<br>";
        foreach ($value as $key => $value) {
            $content2 .= $key." - ".$value[0]."<br>";
        }
    }

    echo "<html><head></head><body>";
    echo "PurchaseOrderNumber:" . $xml->attributes()->PurchaseOrderNumber . "<br>";
    echo "OrderDate:" . $xml->attributes()->OrderDate . "<br><br>";
    echo "<br><b>DeliveryNotes: </b><br><br>";
    echo $content;
    echo "<h3>Items:</h3>";
    echo $content2;
    echo "</body></html>";
}

function task2()
{
    $array = [
        ["Names" =>
            ["Андрей", "Игорь", "Петя", "Василий"],
            "City" =>
                ["Краснодар", "Москва", "Орел", "Нижний Новгород"]
        ],
    ];
    $encoded = json_encode($array, JSON_UNESCAPED_UNICODE);
    file_put_contents("output.json", $encoded);
    if (rand(0, 1) == 1) {
        $data = [["Phone" => ["+7900", "+7800", "+7888", "+7811"]],];
        $file = file_get_contents("output.json");
        $decoded = json_decode($file, true);
        unset($file);
        $fileName = "output2.json";
        $newArray[] = array_merge($decoded[0], $data[0]);
        $file = json_encode($newArray, JSON_UNESCAPED_UNICODE);
        file_put_contents($fileName, $file);
        echo "Изменения сохранили в ".$fileName;
    }
    $file1 = file_get_contents("output.json");
    $decoded1 = json_decode($file1, true);
    $file2 = file_get_contents("output2.json");
    $decoded2 = json_decode($file2, true);
    $result = array_diff_assoc($decoded2[0], $decoded1[0]);
    echo "<h4>В файлах следующие отличие: </h4>";
    echo '<pre>';
    print_r($result);
    echo '</pre>';
}

function task3()
{
    $array = [];
    for ($i = 1; $i <= 50; $i++) {
        $array[] = rand(1, 100);
    }

    $filePatch = "./test.csv";
    $fp = fopen($filePatch, "w");
    fputcsv($fp, $array, ";");
    fclose($fp);
    echo "файл успешно записан".PHP_EOL;
    $csvFile = fopen($filePatch, "r");
    if ($csvFile) {
        $res = [];
        while (($csvData = fgetcsv($csvFile, 500, ";")) !== false) {
            $res = $csvData;
        }
        echo "Сумма в csv файле = ".array_sum($res);
    }
}

function task4()
{
    function search_key($searchKey, $decoded, &$result)
    {
        if (isset($decoded[$searchKey])) {
            $result[] = $decoded[$searchKey];
        }
        foreach ($decoded as $key => $value) {
            if (is_array($value)) {
                search_key($searchKey, $value, $result);
            }
        }
    }
    $result = [];
    $fileArray = file_get_contents("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
    $decoded = json_decode($fileArray, true);
    search_key("title", $decoded, $result);
    echo "title: ".$result[0]."<br>";
    search_key("page_id", $decoded, $result);
    echo "page_id: ".$result[0];
}