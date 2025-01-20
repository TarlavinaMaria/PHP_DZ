<!-- Форма регистрации -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4">Регистрация</h3>
            <?php
            if (!isset($_POST['reg_btn'])) {
                ?>
                <form action="index.php?page=4" method="POST">
                    <div class="form-group">
                        <label for="login">Логин:</label>
                        <input id="login" name="login" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Подтверждение пароля:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" name="reg_btn" class="btn btn-primary btn-block">Зарегистрироваться</button>
                </form>
                <?php
            } else {
                // Обработка данных формы
                $login = $_POST['login'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password_confirmation = $_POST['password_confirmation'];

                // Проверка совпадения паролей
                if ($password !== $password_confirmation) {
                    echo "<div class='container mt-3'><div class='alert alert-danger'>Пароли не совпадают!</div></div>";
                } else {
                    // Установка куки на 2 дня, если регистрация успешна, но пользователь не авторизовался
                    setcookie('user_login', $login, time() + (86400 * 2), "/");
                    setcookie('user_email', $email, time() + (86400 * 2), "/");
                    setcookie('user_password', $password, time() + (86400 * 2), "/");

                    echo "<div class='container mt-3'><div class='alert alert-success'>Регистрация прошла успешно!</div></div>";
                }
            }
            ?>
        </div>
    </div>
</div>