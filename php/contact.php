<?php
include 'db_connect.php';
include 'header.php';
?>



<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/reg.css">
    <link rel="stylesheet" href="../css/contact.css">
    <title>myfitness</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<style>
    header {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../image/contact-fon.png);
        width: 100%;
        height: 551.99px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>



<body>

    <div class="container">
        <div class="contact-block">
            <h1 class="contact-title">Контактная информация</h1>

            <div class="contact-flex-block">
                <div class="contact-flex-item">
                    <ul>
                        <li class="contact-li">Юридический адрес: 107140, Москва г,вн.тер.г. муниципальный округ Красносельский, туп Большой Краснопрудный, д. 8/12, этаж 0, помещ. 2, ком. 4, офис 96</li>
                        <li class="contact-li">Почтовый адрес: 121170 г. Москва,ул. Поклонная, д. 3, секция Е4, 6 этаж.
                        </li>
                        <li class="contact-li">Почта для связи со службой поддрежки: support@myfitnessclub.com
                        </li>
                        <li class="contact-li">Телефон для связи со службой поддрежки: 8 942 147 18 23</li>
                    </ul>
                </div>
                <div class="contact-flex-item">
                    <script class="map" type="text/javascript" style="border-radius: 20px;" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa9edb1a181844a8523e69b1c858296f3c73538da6cb0a630adcadcb08a523b7e&amp;width=724&amp;height=416&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>
        </div>


        <div class="form-contact-block">
            <h1 class="form-title">Форма обратной связи</h1>

            <form action="mailer.php" method="POST" class="formaob">
                <div class="input-block-flex">
                    <div class="input-name-block">
                        <input class="input-name" type="text" name="name" placeholder="Имя" required>
                    </div>
                    <div class="input-tel-block">
                        <input class="input-tel" type="email" name="phone" placeholder="Почта" required>
                    </div>
                </div>
                <div class="input-text-block">
                    <textarea class="input-text" name="message" placeholder="Текст сообщения" required></textarea>
                </div>

                <!-- Капча -->
                <div class="g-recaptcha" data-sitekey="6LezXL0mAAAAAPa5Bi5Ly9fJ8NHox7C854797Sxi"></div>

                <div class="input-btn-block">
                    <input class="formbtn" type="submit" value="Отправить">
                </div>
            </form>


        </div>



        <div class="social-block">
            <h1 class="social-title">Социальные сети</h1>
            <div class="socials-block">
                <div class="social-item">
                    <div class="social-item-img">
                        <img src="../image/tgsocial.png" alt="">
                    </div>
                    <div class="social-item-text">
                        <span class="social-span-text">@moonhore</span>
                    </div>
                </div>

                <div class="social-item">
                    <div class="social-item-img">
                        <img src="../image/vksocial.png" alt="">
                    </div>
                    <div class="social-item-text">
                        <span class="social-span-text">@moonhore</span>
                    </div>
                </div>

                <div class="social-item">
                    <div class="social-item-img">
                        <img src="../image/yt-social.png" alt="">
                    </div>
                    <div class="social-item-text">
                        <span class="social-span-text">@moonhore</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        var onloadCallback = function() {
            alert("grecaptcha is ready!");
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
    <script src="../js/modalauth.js"></script>
</body>

</html>



<?php
include 'footer.php';
?>