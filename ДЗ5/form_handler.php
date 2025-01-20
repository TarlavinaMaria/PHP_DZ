<?php
if (isset($_POST['submit'])) {
    echo "Данные заявителя получены: <br>";
    
    // Получение данных из формы
    $name = htmlspecialchars($_POST['name']); // Имя
    $gender = $_POST['gender']; // Пол
    $work = $_POST['work']; // Работа
    $contacts = $_POST['contacts']; // Телефоны и email
    $extensions = isset($_POST["ext"]) ? $_POST["ext"] : []; // Дополнительные данные (массив)

    $age = $_POST['age']; // Возраст
    $sum = $_POST['sum']; // Сумма кредита
    $term = $_POST['term']; // Срок кредита
    $income = $_POST['income']; // Доход

    // Вывод данных заявителя
    echo "Имя: $name <br>";
    if (isset($_POST['isClient'])) {
        echo "Зарплатный клиент: да<br>";
    } else {
        echo "Зарплатный клиент: нет<br>";
    }
    echo "Пол: $gender <br>";
    echo "Работа: $work <br>";
    echo "Возраст: $age <br>";
    echo "Сумма кредита: $sum <br>";
    echo "Срок кредита: $term мес. <br>";
    echo "Доход: $income <br>";

    echo "Телефоны: <br>";
    foreach ($contacts as $contact) {
        $curContacts = htmlspecialchars($contact);
        echo "$curContacts <br>";
    }

    if (!empty($extensions)) {
        echo "Дополнительные данные: <br>";
        foreach ($extensions as $ext) {
            echo "$ext <br>";
        }
    }

    // Алгоритм принятия решения по выдаче кредита
    $baseRate = 30; // Базовая ставка

    // Условие 1: Отказать всем младше 21 и старше 55
    if ($age < 21 || $age > 55) {
        echo "Отказ: Возраст должен быть от 21 до 55 лет.<br>";
        exit; // Прекращаем выполнение скрипта
    }

    // Условие 2: Для ИП и Самозанятых повысить ставку на 5%
    if ($work == "self" || $work == "businessman") {
        $baseRate += 5;
    }

    // Условие 3: Для многодетных повысить ставку на 5%, для остальных групп повысить на 7%
    if (in_array("childs", $extensions)) {
        $baseRate += 5;
    } elseif (!empty($extensions)) {
        $baseRate += 7;
    }

    // Условие 4: Многодетным матерям до 35 отказать
    if ($gender == "жен" && in_array("childs", $extensions) && $age < 35) {
        echo "Отказ: Многодетным матерям до 35 лет кредит не выдается.<br>";
        exit;
    }

    // Ежемесячный платеж
    $monthlyPayment = ($sum * ($baseRate / 100)) / $term; // Сумма кредита * (ставка / 100) / срок кредита

    // Условие 5: Если платеж превышает 50% от дохода - отказать
    if ($monthlyPayment > ($income * 0.5)) {
        echo "Отказ: Ежемесячный платеж превышает 50% от дохода.<br>";
        exit;
    }

    // Если все условия выполнены, выдать кредит
    echo "Кредит одобрен!<br>";
    echo "Ежемесячный платеж: $monthlyPayment<br>";
    echo "Ставка: $baseRate%<br>";
} else {
    echo "Данные не получены";
}
?>