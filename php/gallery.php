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
    <link rel="stylesheet" href="../css/gallery.css">
    <title>myfitness</title>
</head>

<style>
    header {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../image/gallery-fon.png);
        width: 100%;
        height: 551.99px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
<div class="container">
    <div class="gallery-block">
        <h1 class="gallery-title">Наша галерея</h1>
        <div class="gallery-block-item">
            <div class="gallery-block-item-flex">
                <div class="gallery-block-flex-item">
                    <img src="../image/img1.png" alt="">
                </div>
                <div class="gallery-block-flex-item">
                    <img src="../image/img2.png" alt="">
                </div>
            </div>
        </div>
        <div class="gallery-block-item">
            <div class="gallery-block-item-flex">
                <div class="gallery-block-flex-item">
                    <img src="../image/img3.png" alt="">
                </div>
                <div class="gallery-block-flex-item">
                    <img src="../image/img4.png" alt="">
                </div>
                <div class="gallery-block-flex-item">
                    <img src="../image/img5.png" alt="">
                </div>
            </div>
        </div>
        <div class="gallery-block-item">
            <div class="gallery-block-item-flex">
                <div class="gallery-block-flex-item">
                    <img src="../image/img6.png" alt="">
                </div>
            </div>
        </div>
        <div class="gallery-block-item">
            <div class="gallery-block-item-flex">
                <div class="gallery-block-flex-item">
                    <img src="../image/img7.png" alt="">
                </div>
                <div class="gallery-block-flex-item">
                    <img src="../image/img8.png" alt="">
                </div>
                <div class="gallery-block-flex-item">
                    <img src="../image/img9.png" alt="">
                </div>
            </div>
        </div>
    </div>

</div>
<script src="../js/modalauth.js"></script>
</body>
</html>

<?php
include 'footer.php';
?>