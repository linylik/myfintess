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
    <link rel="stylesheet" href="../css/schedule.css">
    <title>myfitness</title>
</head>

<style>
    header {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../image/schedule-fon.png);
        width: 100%;
        height: 551.99px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="container">
        <div class="schedule-block">
            <h1 class="schedule-title">Наше расписание</h1>

            <div class="schedule-btn-day-block">
                <button class="today-btn">Сегодня</button>
                <button class="tomorrow-btn">Завтра</button>
            </div>

            <div class="schedule-info-block">
                <div class="schedule-info-block-item">
                    <h2 class="schedule-info-item-text">Место проведения</h2>
                </div>
                <div class="schedule-info-block-item">
                    <h2 class="schedule-info-item-text">Дата проведения</h2>
                </div>
                <div class="schedule-info-block-item">
                    <h2 class="schedule-info-item-text">Тренировка</h2>
                </div>
                <div class="schedule-info-block-item">
                    <h2 class="schedule-info-item-text">Время тренировки</h2>
                </div>
                <div class="schedule-info-block-item sche-item-left">
                    <h2 class="schedule-info-item-text">Тренер</h2>
                </div>
            </div>

            <?php
            // SQL-запрос для получения расписания тренировок
            $sql = "SELECT v.venue_name, s.date, t.training_type, t.training_time, tr.trainer_name
                    FROM schedule s
                    INNER JOIN venues v ON s.venue_id = v.venue_id
                    INNER JOIN trainings t ON s.training_id = t.training_id
                    INNER JOIN trainers tr ON t.trainer_id = tr.trainer_id";

            $result = mysqli_query($conn, $sql);

            // Вывод расписания тренировок
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="schedule-training-block">
                        <div class="schedule-training-block-flex">
                            <div class="schedule-training-block-item item-1">
                                <h2 class="schedule-tr-item-venue"><?php echo $row['venue_name']; ?></h2>
                            </div>
                            <div class="schedule-training-block-item item-2">
                                <h2 class="schedule-tr-item-time"><?php echo $row['date']; ?></h2>
                            </div>
                            <div class="schedule-training-block-item item-3">
                                <h2 class="schedule-tr-item-type"><?php echo $row['training_type']; ?></h2>
                            </div>
                            <div class="schedule-training-block-item item-4">
                                <h2 class="schedule-tr-item-trainingtime"><?php echo $row['training_time']; ?></h2>
                            </div>
                            <div class="schedule-training-block-item item-5">
                                <h2 class="schedule-tr-item-name"><?php echo $row['trainer_name']; ?></h2>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</body>

</html>

<?php
include 'footer.php';
?>
