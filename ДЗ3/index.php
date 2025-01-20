<?php
// Функция для добавления разрыва строки
function br() {
    echo "<br>";
}
// Функция для добавления заголовка
function printTitle($title = "", $color = "turquoise")  {
    echo "<h3 style='color:".$color.";'>$title</h3>";
}
//---------------------------------------------------------------------------------------

// Задание 1 - Факториал
printTitle("Факториал");
function calcFactorial($n) {
    if ($n === 0 || $n === 1) {
        return 1;
    }
    return $n * calcFactorial($n - 1);
}
echo calcFactorial(5); // Вывод: 120
br();

// Задание 2 - Функция сортировки с возможностью выбора метода сортировки
printTitle("Функция сортировки с возможностью выбора метода сортировки");
function sortArr($array, $sortBy = 'value', $order = 'asc') {
    if ($sortBy === 'key') {
        if ($order === 'asc') {
            ksort($array);
        } else {
            krsort($array);
        }
    } else {
        if ($order === 'asc') {
            asort($array);
        } else {
            arsort($array);
        }
    }
    return $array;
}

$data = ['b' => 3, 'a' => 1, 'c' => 2];
print_r(sortArr($data, 'key', 'asc')); // Сортировка по ключу по возрастанию
br();
print_r(sortArr($data, 'value', 'desc')); // Сортировка по значению по убыванию

// Задание 3 - Функция конвертации температуры 
printTitle("Функция конвертации температуры");
function convertTemperature($value, $from, $to) {
    $result = null;
    if ($from === 'C') {
        if ($to === 'F') {
            $result = $value * 9 / 5 + 32;
            echo "$value C = $result F";
        } elseif ($to === 'K') {
            $result = $value + 273.15;
            echo "$value C = $result K";
        } else {
            $result = $value;
            echo "$value C = $result C";
        }
    } elseif ($from === 'F') {
        if ($to === 'C') {
            $result = ($value - 32) * 5 / 9;
            echo "$value F = $result C";
        } elseif ($to === 'K') {
            $result = ($value - 32) * 5 / 9 + 273.15;
            echo "$value F = $result K";
        } else {
            $result = $value;
            echo "$value F = $result F";
        }
    } elseif ($from === 'K') {
        if ($to === 'C') {
            $result = $value - 273.15;
            echo "$value K = $result C";
        } elseif ($to === 'F') {
            $result = ($value - 273.15) * 9 / 5 + 32;
            echo "$value K = $result F";
        } else {
            $result = $value;
            echo "$value K = $result K";
        }
    }

    return $result;
}

convertTemperature(100, "C", "K"); // Вывод: 373.15
br();
convertTemperature(100, "F", "C"); // Вывод: 37.777777777778
br();
convertTemperature(100, "K", "F"); // Вывод: 212


// Задание 4 - Функция форматирования строки
printTitle("Функция форматирования строки");
function formatString($string, $style) {
    switch ($style) {
        case 'uppercase':
            return strtoupper($string);
        case 'lowercase':
            return strtolower($string);
        default:
            return $string;
    }
}

echo formatString(" hello world ", 'uppercase'); // Вывод: HELLO WORLD
br();
echo formatString(" HELLO WORLD", 'lowercase'); // Вывод: hello world

?>