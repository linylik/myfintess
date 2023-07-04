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

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/reg.css">
    <title>myfitness</title>
</head>


<style>
    header {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../image/mainfon.png);
        width: 100%;
        height: 551.99px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
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
                <form action="register.php" method="post" enctype="multipart/form-data">
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


<header>
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

<body>




    <div class="container">
        <div class="myfitness-info-block">
            <h1 class="myfitness-heading">MyFitness - Это</h1>

            <div class="myfitness-flex-block">
                <div class="myfitness-flex-left">
                    <p class="myft-heading">Фитнес-клуб, который предлагает широкий спектр услуг и программ для достижения физической формы, здоровья и благополучия.
                        <br> Мы специализируемся на предоставлении качественных тренировок, персонального тренинга, групповых занятий, аэробики, йоги, пилатеса, бокса, функционального тренинга и многого другого.
                    </p>
                    <button class="btn-many pulse">Узнать больше</button>
                </div>
                <div class="myfitness-flex-right">
                    <img src="../image/myftcorp.png" alt="corpimg" class="img-corp">
                </div>

            </div>
        </div>

        <div class="advantages-block">
            <h1 class="advantages-heading">Наши приемущества</h1>

            <div class="advantages-image-block">
                <div class="advantages-image-flex">
                    <div class="advantages-image-item">
                        <div class="glass-block">
                            <h3 class="advantages-heading-info">Лучшие специалисты</h3>
                            <p class="advantages-text">В MyFitnessClub работают высококвалифицированные специалисты, специализирующиеся в различных областях фитнеса и здорового образа жизни</p>
                        </div>
                    </div>
                    <div class="advantages-image-item">
                        <div class="glass-block">
                            <h3 class="advantages-heading-info">Современное оборудование</h3>
                            <p class="advantages-text">В MyFitnessClub предоставляется современное оборудование, которое способствует эффективным и разнообразным тренировкам</p>

                        </div>
                    </div>
                    <div class="advantages-image-item">
                        <div class="glass-block">
                            <h3 class="advantages-heading-info">Комфортные помещения</h3>
                            <p class="advantages-text">В MyFitnessClub<br>предлагается комфортное помещение, созданное для того, чтобы клиенты могли наслаждаться своими тренировками</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>







        <div class="fitness-card-block">

            <div class="fitness-card-items-block">
                <div class="fitness-card-items-flex">
                    <div class="card-block">
                        <div class="fitness-card-silver">
                            <div class="container-card">
                                <div class="card-one">
                                    <div class="myfitness-logo-text">
                                        <span class="corp-card card-style">MyFitness</span>
                                    </div> <img src="../image/logo-mini.svg" alt="logomini" class="logo-mini">
                                </div>
                                <div class="card-two">
                                    <span class="name-card card-style">Silver</span>
                                    <span class="id-card card-style-num">0000 0000</span>
                                </div>
                                <div class="card-three">
                                    <span class="card-fio">NAME</span>
                                </div>
                            </div>

                            <div class="custom-modal">
                                <div class="modal-content-custom">
                                    <div class="modal-flex-block">
                                        <div class="modal-flex-left">

                                            <div class="fitness-card-silver">
                                                <div class="container-card">
                                                    <div class="card-one">
                                                        <div class="myfitness-logo-text">
                                                            <span class="corp-card card-style">MyFitness</span>
                                                        </div>
                                                        <img src="../image/logo-mini.svg" alt="logomini" class="logo-mini">
                                                    </div>
                                                    <div class="card-two">
                                                        <span class="name-card card-style">Silver</span>
                                                        <span class="id-card card-style-num">0000 0000</span>
                                                    </div>
                                                    <div class="card-three">
                                                        <span class="card-fio">NAME</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-flex-right">
                                            <h2 class="modal-silver-title">Silver Fitness Card</h2>
                                            <p class="modal-silver-text">Silver Fitness Card - это идеальный выбор для тех, кто стремится к здоровому образу жизни и регулярным тренировкам. Этот абонемент предоставляет доступ к широкому спектру фитнес-услуг и возможность заниматься в нашем фитнес-клубе с высококвалифицированными тренерами и современным оборудованием.</p>
                                        </div>
                                    </div>
                                    <h2 class="nn-text">Возможности:</h2>
                                    <div class="verf-block">
                                        <div class="verf-left">
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Неограниченный доступ к тренажерному залу и групповым занятиям.</p>
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Индивидуальные консультации с тренером для разработки программы тренировок.</p>
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Скидки на дополнительные услуги, такие как персональные тренировки и спа-процедуры.</p>
                                        </div>
                                        <div class="verf-right">
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Участие в специальных мероприятиях и мастер-классах.</p>
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Возможность бесплатного доступа к онлайн-ресурсам и тренировочным программам.</p>
                                        </div>
                                    </div>
                                    <div class="buy-btn-block">
                                        <button class="btn-buy-silver" onclick="openModalbuy()">Купить</button>
                                    </div>





                                    <div id="buySilverModal" class="modal">
                                        <div class="buySilverModalContent">
                                            <h2 class="select-subs">Выберите подписку</h2>
                                            <div class="btn-buy-silver-d-block">
                                                <form method="POST" action="buy-silver-card.php">
                                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_7_days">Купить на 7 дней</button>
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_30_days">Купить на 30 дней</button>
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_1_year">Купить на 1 год</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>



                            <!-- Конец модалки -->



                        </div>
                        <div class="out-block">
                            <span class="fitness-price">1.700 ₽</span>
                            <button class="fitnesscard-btn">Подробнее</button>
                        </div>

                    </div>

                    <div class="card-block">
                        <div class="fitness-card-gold">
                            <div class="container-card">
                                <div class="card-one">
                                    <div class="myfitness-logo-text">
                                        <span class="corp-card card-style">MyFitness</span>
                                    </div>
                                    <img src="../image/logo-mini.svg" alt="logomini" class="logo-mini">
                                </div>
                                <div class="card-two">
                                    <span class="name-card card-style">Gold</span>
                                    <span class="id-card card-style-num">0000 0000</span>
                                </div>
                                <div class="card-three">
                                    <span class="card-fio">NAME</span>
                                </div>
                            </div>

                            <!-- Модалка gold -->
                            <div class="custom-modal-gold">
                                <div class="modal-content-custom-gold">
                                    <div class="modal-flex-block">
                                        <div class="modal-flex-left">
                                            <h2 class="modal-silver-title">Gold Fitness Card</h2>
                                            <p class="modal-silver-text">Gold Fitness Card - это улучшенный абонемент, предлагающий еще больше возможностей для достижения ваших фитнес-целей. С этим абонементом вы получите премиальный опыт тренировок, дополнительные удобства и персонализированное внимание от нашей команды экспертов.</p>
                                        </div>
                                        <div class="modal-flex-right">
                                            <div class="fitness-card-gold">
                                                <div class="container-card">
                                                    <div class="card-one">
                                                        <div class="myfitness-logo-text">
                                                            <span class="corp-card card-style">MyFitness</span>
                                                        </div>
                                                        <img src="../image/logo-mini.svg" alt="logomini" class="logo-mini">
                                                    </div>
                                                    <div class="card-two">
                                                        <span class="name-card card-style">Gold</span>
                                                        <span class="id-card card-style-num">0000 0000</span>
                                                    </div>
                                                    <div class="card-three">
                                                        <span class="card-fio">NAME</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="nn-text">Возможности:</h2>
                                    <div class="verf-block">
                                        <div class="verf-left">
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Все преимущества Silver Fitness Card</p>
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Приоритетный доступ к тренажерному залу и групповым занятиям.</p>
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Персональный тренер для индивидуальных тренировок и разработки индивидуальной программы.</p>
                                        </div>
                                        <div class="verf-right">
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Доступ к эксклюзивным тренировочным зонам и оборудованию.</p>
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Дополнительные сеансы массажа и спа-процедуры.Скидки на услуги питания и спортивного питания.</p>
                                            <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Приглашение на VIP-мероприятия и тренировки с известными спортсменами и тренерами.</p>
                                        </div>
                                    </div>

                                    <div class="buy-btn-block">
                                        <button class="btn-buy-silver" onclick="openModalbuygold()">Купить</button>
                                    </div>





                                    <div id="buyGoldModal" class="modal">
                                        <div class="buySilverModalContent">
                                            <h2 class="select-subs">Выберите подписку</h2>
                                            <div class="btn-buy-silver-d-block">
                                                <form method="POST" action="buy-gold-card.php">
                                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_7_days">Купить на 7 дней</button>
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_30_days">Купить на 30 дней</button>
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_1_year">Купить на 1 год</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Конец модалки -->


                        </div>
                        <div class="out-block">
                            <span class="fitness-price">2.000 ₽</span>
                            <button class="fitnesscard-btn-gold">Подробнее</button>
                        </div>
                    </div>




                </div>
                <div class="card-block">
                    <div class="fitness-card-diamond">
                        <div class="container-card">
                            <div class="card-one">
                                <div class="myfitness-logo-text">
                                    <span class="corp-card card-style">MyFitness</span>
                                </div> <img src="../image/logo-mini.svg" alt="logomini" class="logo-mini">
                            </div>
                            <div class="card-two">
                                <span class="name-card card-diamond">Diamond</span>
                                <span class="id-card card-style-num">0000 0000</span>
                            </div>
                            <div class="card-three">
                                <span class="card-fio">NAME</span>
                            </div>
                        </div>
                    </div>





                    <div class="out-block">
                        <span class="fitness-price">2.500 ₽</span>
                        <button class="fitnesscard-btn-diamond">Подробнее</button>
                    </div>
                </div>


                <!-- Модалка diamond -->
                <div class="custom-modal-diamond">
                    <div class="modal-content-custom-diamond">
                        <h2 class="nn-text-diamond">Возможности:</h2>
                        <div class="verf-block">
                            <div class="verf-left">
                                <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Все преимущества Gold Fitness Card</p>
                                <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Персональный тренер-консультант, доступный круглосуточно.</p>
                                <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Индивидуальные тренировки с известными тренерами и специалистами.</p>
                            </div>
                            <div class="verf-right">
                                <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Персонализированный подход к питанию и диетическим рекомендациям.</p>
                                <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">ВИП-парковка и бесплатный доступ ко всем услугам фитнес-клуба.</p>
                                <p class="verf-text"><img class="mark-img" src="../image/mark.svg" alt="mark">Особые подарки и бонусы для владельцев Diamond Fitness Card.</p>
                            </div>
                        </div>
                        <div class="modal-flex-block-diamond">
                            <div class="modal-flex-left">
                                <h2 class="modal-diamond-title">Diamond Fitness Card</h2>
                                <p class="modal-diamond-text">Diamond Fitness Card - это самый престижный абонемент, предоставляющий полный доступ ко всему спектру наших фитнес-услуг и привилегии для истинных энтузиастов фитнеса. С этим абонементом вы получите максимальное внимание, удобства и эксклюзивные возможности.</p>
                            </div>
                            <div class="modal-flex-right-diamond">
                                <div class="fitness-card-diamond">
                                    <div class="container-card">
                                        <div class="card-one">
                                            <div class="myfitness-logo-text">
                                                <span class="corp-card card-style">MyFitness</span>
                                            </div> <img src="../image/logo-mini.svg" alt="logomini" class="logo-mini">
                                        </div>
                                        <div class="card-two">
                                            <span class="name-card card-diamond">Diamond</span>
                                            <span class="id-card card-style-num">0000 0000</span>
                                        </div>
                                        <div class="card-three">
                                            <span class="card-fio">NAME</span>
                                        </div>
                                    </div>
                                    <div class="buy-btn-block">
                                        <button class="btn-buy-silver" onclick="openModalbuydiamond()">Купить</button>
                                    </div>





                                    <div id="buyDiamondModal" class="modal">
                                        <div class="buySilverModalContent">
                                            <h2 class="select-subs">Выберите подписку</h2>
                                            <div class="btn-buy-silver-d-block">
                                                <form method="POST" action="buy-diamond-card.php">
                                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_7_days">Купить на 7 дней</button>
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_30_days">Купить на 30 дней</button>
                                                    <button class="btn-buy-silver-d" type="submit" name="buy_1_year">Купить на 1 год</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Конец модалки -->

            </div>
        </div>


    </div>
    <script src="../js/modalauth.js"></script>
    <script src="../js/modalsilver.js"></script>
    <script src="../js/modalgold.js"></script>
    <script src="../js/modaldiamond.js"></script>
    <script src="../js/buy-silver-modal.js"></script>
    <script src="../js/buy-gold-modal.js"></script>
    <script src="../js/buy-diamond-modal.js"></script>
</body>
<footer>
    <div class="footer-container">
        <div class="footer-block">
            <div class="footer-block-item">
                <img src="../image/footer-logo.svg" alt="footerlogo" class="footer-logo">
            </div>
            <div class="footer-block-item">
                <ul class="footer-list-item">
                    <li class="footer-list-item"><a href="main.php" class="footer-list-link">Главная</a></li>
                    <li class="footer-list-item"><a href="company.php" class="footer-list-link">О клубе</a></li>
                    <li class="footer-list-item"><a href="services.php" class="footer-list-link">Услуги</a></li>
                </ul>
                <ul class="footer-list-item">
                    <li class="footer-list-item"><a href="gallery.php" class="footer-list-link">Галерея</a></li>
                    <li class="footer-list-item"><a href="contact.php" class="footer-list-link">Контакты</a></li>
                    <li class="footer-list-item"><a href="news.php" class="footer-list-link">Новости</a></li>
                </ul>

            </div>
            <div class="footer-block-item">
                <h2 class="footer-block-heading">Cкачайте приложение
                    <span class="footer-heading-color"><br>для управления клубной картой</span>
                </h2>
                <div class="market-block">
                    <span class="appstore"><img src="../image/appstore.svg" alt="appstore"></span>
                    <span class="googleplay"><img src="../image/googleplay.svg" alt="googleplay"></span>
                </div>

            </div>
            <div class="footer-block-item">
                <h2 class="social-heading">Мы в соц. сетях</h2>

                <div class="social-link">
                    <span class="tg"><a href=""><img src="../image/tg.svg" alt="tg"></a></span>
                    <span class="vk"><a href=""><img src="../image/vk.svg" alt="vk"></a></span>
                    <span class="yt"><a href=""><img src="../image/yt.svg" alt="yt"></a></span>
                </div>
            </div>
        </div>
    </div>

</footer>

</html>