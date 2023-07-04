<?php
include 'db_connect.php';
include 'header.php';

// Проверяем, передан ли идентификатор новости в URL
if (isset($_GET['news_id'])) {
    $newsId = $_GET['news_id'];

    // Получаем информацию о выбранной новости
    $stmt = $conn->prepare("SELECT * FROM news WHERE news_id = ?");
    $stmt->bind_param("i", $newsId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Проверяем, есть ли новость с указанным идентификатором
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <div class="container">
            <div class="news-details-block">
                <div class="news-details-image">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="News Image" style="width: 100%; height: 50%; object-fit: cover; border-radius: 20px;">' ?>
                </div>
                <div class="btn-return-block">
                <a href="news.php" class="btn-return">Вернуться к новостям</a>

                </div>

                <h1 class="news-details-title"><?php echo $row['title']; ?></h1>

                <div class="news-details-content">
                    <p><?php echo $row['content']; ?></p>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Новость не найдена.";
    }
} else {
    echo "Идентификатор новости не указан.";
}

include 'footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/reg.css">
    <link rel="stylesheet" href="../css/news.css">
    <title>myfitness</title>
</head>

<body>

</body>

</html>