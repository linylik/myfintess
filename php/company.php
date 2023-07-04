<?php
include 'db_connect.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/reg.css">
    <link rel="stylesheet" href="../css/company.css">
    <title>myfitness</title>
</head>
<style>
    header {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../image/company-fon.png);
        width: 100%;
        height: 551.99px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>


<body>

    <div class="container">
        <div class="history-block">
            <h1 class="history-title">Наша история</h1>
            <p>MyFitness - это фитнес-клуб, который был создан с целью предоставить своим членам уникальные возможности для достижения своих фитнес-целей и поддержания здорового образа жизни. </p>
            <p>Клуб MyFitness был основан в 2008 году и с тех пор стал одним из ведущих фитнес-клубов в своей области. За время своего существования клуб прошел важные этапы развития, открывая новые филиалы и расширяя свою клиентскую базу. Клуб постоянно развивается, предлагая новые программы тренировок, улучшая услуги и поддерживая высокий уровень качества.</p>
        </div>
        <div class="tasks-block">
            <h1>Задачи и ценности</h1>
            <p>Основной задачей клуба MyFitness является помощь своим членам достигать и поддерживать здоровье и физическую форму. Клуб стремится создать вдохновляющую и поддерживающую атмосферу, где каждый может найти мотивацию и индивидуальную поддержку для достижения своих целей. Основные ценности клуба включают инновационность, профессионализм, качество услуг, персонализацию и заботу о клиентах.</p>
        </div>
        <div class="coach-block">
            <h1>Тренера</h1>
            <p>Профессиональные тренеры: В клубе MyFitness работают опытные и квалифицированные тренеры, готовые помочь каждому члену в разработке индивидуальной программы тренировок и достижении оптимальных результатов.</p>
            <div class="coach-info-block">
                <div class="coach-block-up">
                    <div class="coach-item">
                        <img src="../image/aleks.png" alt="" class="coach-image">
                        <div class="coach-item-text">
                            <h2 class="coach-name">Алексей</h2>
                            <h2 class="coach-profession">Главный тренер</h2>
                        </div>
                    </div>

                    <div class="coach-item">
                        <img src="../image/oksana.png" alt="" class="coach-image">
                        <div class="coach-item-text">
                            <h2 class="coach-name">Оксана</h2>
                            <h2 class="coach-profession">Тренер по боксу</h2>
                        </div>
                    </div>

                    <div class="coach-item">
                        <img src="../image/kris.png" alt="" class="coach-image">
                        <div class="coach-item-text">
                            <h2 class="coach-name">Кристина</h2>
                            <h2 class="coach-profession">Тренер по йоге</h2>
                        </div>
                    </div>

                    <div class="coach-item">
                        <img src="../image/grig.png" alt="" class="coach-image">
                        <div class="coach-item-text">
                            <h2 class="coach-name">Григорий</h2>
                            <h2 class="coach-profession">Групповой тренер</h2>
                        </div>
                    </div>

                </div>
                <div class="coach-block-down">
                    <div class="coach-item">
                        <img src="../image/oleg.png" alt="" class="coach-image">
                        <div class="coach-item-text">
                            <h2 class="coach-name">Олег</h2>
                            <h2 class="coach-profession">Тренер по бодибилдингу</h2>
                        </div>
                    </div>

                    <div class="coach-item">
                        <img src="../image/mihail.png" alt="" class="coach-image">
                        <div class="coach-item-text">
                            <h2 class="coach-name">Михаил</h2>
                            <h2 class="coach-profession">Тренер по фитнесу</h2>
                        </div>
                    </div>

                    <div class="coach-item">
                        <img src="../image/eliz.png" alt="" class="coach-image">
                        <div class="coach-item-text">
                            <h2 class="coach-name">Елизавета</h2>
                            <h2 class="coach-profession">Персональный тренер</h2>
                        </div>
                    </div>

                    <div class="coach-item">
                        <img src="../image/ignat.png" alt="" class="coach-image">
                        <div class="coach-item-text">
                            <h2 class="coach-name">Игнат</h2>
                            <h2 class="coach-profession">Персональный тренер</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="myfitness-block">
            <h1 class="myfitness-title">MyFitness</h1>
            <p class="myfitness-text">Клуб создает комфортную и дружелюбную атмосферу, где каждый член может чувствовать себя комфортно и вдохновленно заниматься спортом.</p>
            <p class="myfitness-text">Клуб также предлагает дополнительные услуги, такие как сауны, бассейны, массажные кабинеты, косметические процедуры и диетическое консультирование, чтобы обеспечить полноценный комплекс услуг для своих членов.</p>
        </div>


        <div class="myfitness-slider-block">
            <div class="myfitness-slider">
                <img src="../image/slider-photo1.png" alt="Фотография 1" class="slide">
                <img src="../image/slider-photo2.png" alt="Фотография 2" class="slide">
                <img src="../image/slider-photo3.png" alt="Фотография 3" class="slide">
                <img src="../image/slider-photo4.png" alt="Фотография 4" class="slide">
                <img src="../image/slider-photo5.png" alt="Фотография 5" class="slide">
                <img src="../image/slider-photo6.png" alt="Фотография 6" class="slide">
            </div>
            <div class="slider-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>

    </div>
    <script src="../js/modalauth.js"></script>
    <script src="../js/slider-company.js"></script>
</body>

</html>
<?php
include 'footer.php';
?>