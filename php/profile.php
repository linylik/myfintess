<?php
include 'db_connect.php';
include 'header.php';




if (isset($_SESSION['username'])) {
    $userId = $_SESSION['username'];

    $query = "SELECT profile_photo, fitness_card_name, duration, end_date FROM users WHERE username = '$userId'";

    // Получаем путь к фото и информацию о фитнес-карте из результата запроса
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $photoPath = $row['profile_photo'];
    $fitnessCardName = $row['fitness_card_name'];
    $duration = $row['duration'];
    $endDate = $row['end_date'];

    // Рассчитываем оставшееся время до конца фитнес-карты
    $remainingTime = '';

    if ($endDate) {
        $currentDate = date('Y-m-d');
        if ($currentDate <= $endDate) {
            $remainingTime = date_diff(date_create($currentDate), date_create($endDate))->format('%a дней');
        } else {
            $remainingTime = 'Истекло';
        }
    }



    // Проверяем, был ли загружен файл
    if (isset($_FILES['profile-photo'])) {
        // Получаем информацию о загруженном файле
        $file = $_FILES['profile-photo'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Проверяем наличие ошибок при загрузке файла
        if ($fileError === UPLOAD_ERR_OK) {
            // Генерируем уникальное имя файла
            $newFileName = uniqid('', true) . '_' . $fileName;

            // Определяем путь, куда будет сохранен файл
            $uploadPath = '../profile_photos/' . $newFileName;

            // Перемещаем загруженный файл в указанную директорию
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // Обновляем путь к фото в базе данных
                $updateQuery = "UPDATE users SET profile_photo = '$uploadPath' WHERE username = '$userId'";
                mysqli_query($conn, $updateQuery);

                // Обновляем переменную $photoPath для отображения нового фото
                $photoPath = $uploadPath;
            } else {
                echo '<script>alert("Ошибка при загрузке файла.");</script>';
            }
        } else {
            echo '<script>alert("Ошибка при загрузке файла.");</script>';
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/reg.css">
    <link rel="stylesheet" href="../css/profile.css">
    <title>myfitness</title>
</head>

<body>
    <div class="container">
        <div class="profile-block">
            <div class="profile-image">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" id="photo-upload" name="profile-photo" accept="image/*" style="display: none;">
                    <label for="photo-upload" class="profile-text-img">Загрузить фото</label>
                    <?php if ($photoPath) : ?>
                        <img class="profilephoto" src="<?php echo $photoPath; ?>" alt="Фото профиля">
                    <?php endif; ?>
                </form>
            </div>
            <div class="profile-info">
                <?php
                // Проверяем авторизацию пользователя
                if (isset($_SESSION['username'])) {
                    $userId = $_SESSION['username'];

                    // SQL-запрос для получения логина и почты из таблицы "users"
                    $query = "SELECT username, email FROM users WHERE username = '$userId'";
                    $result = mysqli_query($conn, $query);

                    // Проверка наличия данных
                    if (mysqli_num_rows($result) > 0) {
                        // Получение логина и почты из результата запроса
                        $row = mysqli_fetch_assoc($result);
                        $username = $row['username'];
                        $email = $row['email'];
                ?>
                        <div class="profile-info-t-block">
                            <p class="profile-info-t">Логин: <?php echo $username; ?></p>
                            <p class="profile-info-t">Почта: <?php echo $email; ?></p>
                            <?php if ($fitnessCardName) : ?>
                                <p class="profile-info-t">Фитнес-карта: <?php echo $fitnessCardName; ?></p>
                                <?php if ($remainingTime) : ?>
                                    <p class="profile-info-t">Осталось: <?php echo $remainingTime; ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <!-- Модальное окно для загрузки фото -->
    <div id="myModal2" class="modalprof">
        <div class="modal-content">
            <h2 class="loadphoto">Загрузить фото</h2>
            <form id="upload-form" method="post" enctype="multipart/form-data">
                <input type="file" id="photo-upload" name="profile-photo" accept="image/*">
                <input type="submit" value="Загрузить">
            </form>
        </div>
    </div>


    <script src="../js/profile.js"></script>
</body>

</html>

<?php
include 'footer.php';
?>