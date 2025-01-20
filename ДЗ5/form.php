<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кредит</title>
</head>

<body>
    <?
    require_once("functions.php");
    ?>

    <form action="form_handler.php" method="POST">
        <h3>Банк "Очень честный"</h3>
        <h4>Заявка на кредит: </h4>
        <label for="name">ФИО: </label>
        <input name="name" id="name" placeholder="ФИО" required>
        <br><br>
        <label for="age">Возраст: </label>
        <input name="age" id="age" type="number" placeholder="Возраст" required>
        <br><br>
        <label for="sum">Сумма кредита: </label>
        <input name="sum" id="sum" type="number" placeholder="Сумма кредита" required>
        <br><br>
        <label for="term">Срок кредита (от 6 мес до 5 лет): </label>
        <input name="term" id="term" type="number" placeholder="Срок кредита" required>
        <br><br>
        <label for="income">Доход: </label>
        <input name="income" id="income" type="number" placeholder="Доход" required>
        <br><br>
        <p><b>Ваш пол: </b></p>

        <input type="radio" name="gender" id="male" value="муж" checked>
        <label for="male">Мужской</label>
        <input type="radio" name="gender" id="female" value="жен">
        <label for="female">Женский</label>

        <br><br>
        <input type="checkbox" name="isClient" id="isClient" value="yes">
        <label for="isClient">Являюсь зарплатным клиентом банка</label>
        <br><br>
        <label for="work">Тип занятости: <br></label>
        <select name="work">
            <option value="employed">Работник по найму</option>
            <option value="self">Самозанятый</option>
            <option value="businessman">ИП</option>
            <option value="pensioner">Пенсионер</option>
        </select>
        <br><br>
        <p><b>Дополнительные данные: </b></p>
        <input type="checkbox" name="ext[]" value="childs">Многодетный человек
        <input type="checkbox" name="ext[]" value="army">Военный человек
        <input type="checkbox" name="ext[]" value="fromWarZone">Человек из зоны военных действий
        <br><br>
        <p><b>Контактные данные: </b></p>
        <input name="contacts['tel1']" placeholder="Телефон 1" required>
        <br><br>
        <input name="contacts['tel2']" placeholder="Телефон 2">
        <br><br>
        <input type="email" name="contacts['email']" placeholder="Email">
        <br><br>
        <input type="submit" name="submit" value="Отправить">

    </form>
</body>

</html>