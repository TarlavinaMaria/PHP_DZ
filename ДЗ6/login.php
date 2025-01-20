<!-- Форма входа -->
<?php
session_start(); // Запуск сессии
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4">Вход</h3>
            <form action="index.php?page=5" method="POST">
                <div class="form-group">
                    <label for="login">Логин:</label>
                    <input id="login" name="login" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Запомнить меня</label>
                </div>
                <button type="submit" name="login_btn" class="btn btn-primary btn-block">Войти</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['login_btn'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false; // Проверяем, выбрана ли опция "Запомнить меня"

    // Проверка данных пользователя (сравнение с куки)
    if (isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])) {
        if ($_COOKIE['user_login'] === $login && $_COOKIE['user_password'] === $password) {
            // Успешная аутентификация
            $_SESSION['user_login'] = $login; // Создаем сессию по юзеру

            if ($remember) {
                // Устанавливаем куки на 30 дней
                setcookie('user_login', $login, time() + (86400 * 30), "/");
                setcookie('user_password', $password, time() + (86400 * 30), "/");
            }

            header("Location: pages/profile.php"); // Перенаправляем на страницу профиля
            exit();
        } else {
            echo "<div class='container mt-3'><div class='alert alert-danger'>Неверный логин или пароль!</div></div>";
        }
    } else {
        echo "<div class='container mt-3'><div class='alert alert-danger'>Пользователь не найден!</div></div>";
    }
}
?>