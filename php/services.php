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
    <link rel="stylesheet" href="../css/services.css">
    <title>myfitness</title>
</head>

<style>
    header {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../image/services-fon.png);
        width: 100%;
        height: 551.99px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="container">



        <div class="fitness-card-block-info">
            <h1 class="fitness-card-title">Фитнес карты</h1>
            <p class="fitness-card-text">В клубе MyFitness предлагаются различные виды фитнес-карт, предоставляющих участникам разные уровни доступа и привилегий. Вот краткое описание каждой из них:</p>
            <ul class="fitness-card-spisk">
                <li class="fitnesscard-spisk-item"><span class="strong">Silver Fitness Card</span>- это базовый уровень абонемента, который дает доступ к основным услугам клуба. Владельцы Silver Fitness Card имеют возможность посещать тренажерный зал, участвовать в групповых занятиях и использовать общедостуные зоны клуба. </li>
                <li class="fitnesscard-spisk-item"><span class="strong">Gold Fitness Card</span> предоставляет более широкий спектр привилегий и возможностей, чем Silver Fitness Card. Владельцы Gold Fitness Card могут пользоваться всеми услугами Silver Fitness Card, а также получают дополнительные преимущества, такие как доступ к эксклюзивным программам тренировок, индивидуальные консультации тренера и дополнительные услуги в клубе.</li>
                <li class="fitnesscard-spisk-item"><span class="strong">Diamond Fitness Card</span> - это премиальный уровень абонемента, предоставляющий полный спектр возможностей и привилегий клуба. Владельцы Diamond Fitness Card имеют доступ к всем услугам и программам клуба, включая индивидуальные тренировки с личным тренером, специальные мероприятия и эксклюзивные бонусы.</li>
            </ul>
        </div>


        <div class="fitness-card-block">

            <div class="fitness-card-items-block-ser">
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
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Конец модалки -->

            </div>
        </div>

        <div class="additional-services-block">
            <h1 class="additional-title">Дополнительные услуги</h1>
            <p class="additional-text">В клубе MyFitness предоставляются различные дополнительные услуги, которые обогащают фитнес-опыт участников. Вот некоторые из них:
            </p>
            <p class="additional-text"><strong>Бассейн:</strong> Клуб MyFitness предлагает доступ к современному бассейну, где участники могут заниматься плаванием или проводить тренировки в воде. Бассейн оборудован специальными средствами фильтрации и поддержания чистоты воды, а также имеет комфортабельные раздевалки и душевые.</p>
            <p class="additional-text">Единичное посещение: от 300 до 600 рублей.
                Абонемент на месяц: от 2000 до 4000 рублей.
                Дополнительные индивидуальные занятия с тренером в бассейне: от 1500 до 3000 рублей за сессию.</p>

            <div class="sport-image-block">
                <img src="../image/pool-img.png" alt="" class="pool">
            </div>

            <p class="additional-text"><strong>СПА и Веллнес:</strong> Клуб MyFitness предоставляет возможность расслабиться и восстановиться в спа-зоне. Участники могут наслаждаться различными процедурами, такими как массаж, сауна, гидромассажные ванны и другие спа-услуги. Это помогает снять напряжение, улучшить кровообращение и общее состояние организма.</p>
            <p class="additional-text">Массаж: от 3000 до 6000 рублей за сеанс.
                Сауна: от 1000 до 2000 рублей за посещение.
                Гидромассажные ванны: от 2000 до 4000 рублей за сеанс.</p>

            <div class="sport-image-block">
                <img src="../image/spa.png" alt="" class="spa">
            </div>
            <p class="additional-text"><strong>Дополнительные тренировки и программы:</strong> Клуб MyFitness предлагает разнообразные дополнительные тренировки и программы, которые могут быть приобретены отдельно или включены в специальные пакеты. Это могут быть индивидуальные тренировки с тренером, групповые занятия по йоге, пилатесу, функциональной тренировке и другим направлениям.</p>
            <p class="additional-text"> <strong>Индивидуальная тренировка с персональным тренером:</strong>
                <br>
                Единичная тренировка: от 2000 до 4000 рублей.
                Пакет из 5 тренировок: от 9000 до 15000 рублей.
                Пакет из 10 тренировок: от 16000 до 25000 рублей.<br>
                <strong>Групповые тренировки:</strong>
                Единичное посещение: от 500 до 1000 рублей.
                Абонемент на месяц: от 3000 до 6000 рублей.
                Сезонный абонемент: от 10000 до 20000 рублей. <br>
                <strong>Специальные программы:</strong>
                Фитнес-программа для начинающих: от 5000 до 8000 рублей.
                Интенсивный кардио-тренинг: от 6000 до 10000 рублей.
                Программа функционального тренировочного комплекса: от 7000 до 12000 рублей.
            </p>

            <div class="sport-image-block">
                <img src="../image/workout.png" alt="" class="workout">
            </div>





        </div>

    </div>




    <script src="../js/modalauth.js"></script>
    <script src="../js/modalsilver.js"></script>
    <script src="../js/modalgold.js"></script>
    <script src="../js/modaldiamond.js"></script>
</body>

</html>



<?php
include 'footer.php';
?>