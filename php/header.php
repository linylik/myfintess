<?php
include 'db_connect.php';
session_start();
$isLoggedIn = isset($_SESSION['username']);

// Проверка действий пользователя
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'logout') {
        // Выход пользователя из аккаунта
        session_unset();
        session_destroy();
        header("Location: main.php");
        exit();
    } elseif ($action === 'profile') {
        // Переход к профилю пользователя
        // Замените эту ссылку на ссылку на профиль пользователя
        header("Location: profile.php");
        exit();
    }
}
?>
<?php
if (isset($_SESSION['success_message'])) {
    echo "<script>alert('{$_SESSION['success_message']}');</script>";
    unset($_SESSION['success_message']);
}
?>

<div id="myModal" class="modal-auth">
    <div class="auth-block">
        <div class="logo-block">
            <span class="logo-auth">
                <img src="../image/auth-logo.svg" alt="" class="auth-logo">
            </span>
        </div>
        <div class="auth-info-block">
            <div class="auth-heading-block">
                <h2 class="auth-heading">Авторизация</h2>
            </div>

            <div class="form-block">
                <form action="login.php" method="post">
                    <div class="login-block">
                        <label class="label-text" for="login">Логин</label><br>
                        <input id="login" name="login" class="login-enter" type="text" required>
                    </div>
                    <div class="password-block">
                        <label class="label-text" for="password">Пароль</label><br>
                        <input id="password" name="password" class="password-enter" type="password" required>
                    </div>

                    <div class="button-block">
                        <input class="login-btn" type="submit" value="Войти">
                    </div>
                    <div class="transition">
                        <span class="transition-to-registration" onclick="openModal('reg')">Ещё нет аккаунта?</span>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="reg-block">
        <div class="logo-block">
            <span class="logo-auth">
                <img src="../image/auth-logo.svg" alt="" class="auth-logo">
            </span>
        </div>
        <div class="reg-info-block">
            <div class="reg-heading-block">
                <h2 class="reg-heading">Регистрация</h2>
            </div>

            <div class="form-block">
                <form action="register.php" method="post">
                    <div class="login-block">
                        <label class="label-text" for="reg-login">Логин</label><br>
                        <input id="reg-login" class="login-enter" type="text" name="reg-login" required>
                    </div>
                    <div class="password-block">
                        <label class="label-text" for="reg-password">Пароль</label><br>
                        <input id="reg-password" class="password-enter" type="password" name="reg-password" required>
                    </div>
                    <div class="email-block">
                        <label class="label-text" for="email">Email</label><br>
                        <input id="email" class="email-enter" type="email" name="email" required>
                    </div>
                    <div class="button-block">
                        <input class="reg-btn" type="submit" value="Зарегистрироваться">
                    </div>
                    <div class="transition">
                        <span class="transition-to-registration" onclick="openModal('auth')">Уже есть аккаунт?</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<header id="header" class="sticky">
    <div class="container">
        <div class="navbar-block">
            <ul class="navbar-list">
                <li class="navbar-item navbar-item-logo"><a href="main.php" class="navbar-link-logo"><img src="../image/logo.svg" alt="logo" class="logo-image"></a></li>
                <li class="navbar-item"><a href="main.php" class="navbar-link">Главная</a></li>
                <li class="navbar-item"><a href="company.php" class="navbar-link">О клубе</a></li>
                <li class="navbar-item"><a href="services.php" class="navbar-link">Услуги и программы</a>
                    <ul class="dropdown">
                        <li><a class="sсhedule" href="schedule.php">Расписание</a></li>
                    </ul>
                </li>
                <li class="navbar-item"><a href="gallery.php" class="navbar-link">Галерея</a></li>
                <li class="navbar-item"><a href="contact.php" class="navbar-link">Контакты</a></li>
                <li class="navbar-item"><a href="news.php" class="navbar-link">Новости</a></li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <?php
                    // Проверка статуса пользователя
                    $username = $_SESSION['username'];
                    $query = "SELECT * FROM users WHERE username = '$username' AND status = 1";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        // Пользователь имеет статус 1 (администратор)
                        ?>
                        <li class="navbar-item">
                            <div class="user-photo-block">
                                <img src="<?php echo $_SESSION['profile_photo']; ?>" alt="User Photo" class="user-photo" style="width: 100px; height: 100px; border-radius: 50%;">
                                <ul class="user-actions">
                                    <li><a href="profile.php?action=profile" class="action-text underline-one">Профиль</a></li>
                                    <li><a href="main.php?action=logout" class="action-text underline-one">Выйти</a></li>
                                    <li><a href="admin.php" class="action-text underline-one">Админка</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="navbar-item">
                            <div class="user-photo-block">
                                <img src="<?php echo $_SESSION['profile_photo']; ?>" alt="User Photo" class="user-photo" style="width: 100px; height: 100px; border-radius: 50%;">
                                <ul class="user-actions">
                                    <li><a href="main.php?action=logout" class="action-text underline-one">Выйти</a></li>
                                    <li><a href="profile.php?action=profile" class="action-text underline-one">Профиль</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                <?php else : ?>
                    <li class="navbar-item"><button class="login-button" onclick="openModal('auth')">Войти</button></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>
<script src="../js/header.js"></script>