<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Form</title>
</head>
<body>
    <h1>GET Form</h1>

    <!-- HTML форма с методом GET -->
    <form method="GET" action="">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Возраст:</label>
        <input type="number" id="age" name="age" required><br><br>

        <button type="submit" name="submit">Отправить</button>
    </form>

    <!-- Отображение данных после отправки формы -->
    <?php
    if (isset($_GET["submit"])) {
        $name = htmlspecialchars($_GET['name']);
        $age = htmlspecialchars($_GET['age']);

        echo "<h2>Введенные данные:</h2>";
        echo "Имя: $name<br>";
        echo "Возраст: $age<br>";
    }
    ?>
</body>
</html>