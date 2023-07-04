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
    <link rel="stylesheet" href="../css/news.css">
    <title>myfitness</title>
</head>

<style>
    header {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../image/news-fon.png);
        width: 100%;
        height: 551.99px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="container">
        <div class="news-block">
            <h1 class="news-title">Наши новости</h1>

            <?php
            $stmt = $conn->query("SELECT * FROM news ORDER BY date DESC");
            while ($row = $stmt->fetch_assoc()) {
            ?>
                <div class="news-item-block">
                    <h2 class="news-item-title">
                        <a href="news_details.php?news_id=<?php echo $row['news_id']; ?>"><?php echo $row['title']; ?></a>
                    </h2>
                    <div class="news-item-image">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="News Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px;">' ?>
                        <span class="news-span-date"><?php echo $row['date']; ?></span>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>

    <script src="../js/modalauth.js"></script>

</body>

</html>

<?php
include 'footer.php';
?>
