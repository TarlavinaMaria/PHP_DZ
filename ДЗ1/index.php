<?
// Определите переменные с разными типами данных и выведите их значения.
echo "Переменные: <br>";
$var1 = 1;
$var2 = 2.5;
$var3 = "Hello World";
$var4 = true;
$var5 = null;

echo "var1 = $var1 <br>";
echo "var2 = $var2 <br>";
echo "var3 = $var3 <br>";
echo "var4 = $var4 <br>";
echo "var5 = $var5 <br>";
echo "<br>";

// Реализовать простейший калькулятор с помощью switch
echo "Калькулятор: <br>";
$a = 10;
$b = 5;
$operator = "/";

switch ($operator) {
    case "+":
        $result = $a + $b;
        echo "Сложение: $a + $b = $result <br>";
        break;
    case "-":
        $result = $a - $b;
        echo "Вычитание: $a - $b = $result <br>";
        break;
    case "*":
        $result = $a * $b;
        echo "Умножение: $a * $b = $result <br>";
        break;
    case "/":
        $result = $a / $b;
        echo "Деление: $a / $b = $result <br>";
        break;
    default:
        $result = "Неверный оператор";
}

?>