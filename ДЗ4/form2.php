<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Form</title>
</head>
<body>
    <h1>POST Form</h1>

    <!-- HTML форма с методом POST -->
    <form method="POST" action="">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="comment">Комментарий:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>

        <button type="submit" name = "submit">Отправить</button>
    </form>

    <!-- Отображение данных после отправки формы -->
    <?php
    if (isset($_POST["submit"])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $comment = htmlspecialchars($_POST['comment']);

        echo "<h2>Введенные данные:</h2>";
        echo "Имя: $name<br>";
        echo "Email: $email<br>";
        echo "Комментарий: $comment<br>";
    }
    ?>
</body>
</html>