<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$rest = new Controllers();

function e($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録画面</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>

<div class='back'>
<h1>お問い合わせ</h1>

    <form name="form" action="conf.php" method="POST">

        <div class='flex'>
        <label class='main'>　　　飲食店名</label>
            <?php if(!empty($_SESSION['nameError'])): ?>
            <p><?php echo $_SESSION['nameError'] ?></p>
            <?php endif; ?>
        <input type="text" class='sub' name="name"placeholder="飲食店名" value=""><br><br>
        </div>

        <div class='flex'>
        <label class='main'>　　　ジャンル</label>
            <?php if(!empty($_SESSION['genreError'])): ?>
            <p><?php echo $_SESSION['genreError'] ?></p>
            <?php endif; ?>
        <input type="text"  class='sub' name="genre"placeholder="ジャンル" value=""><br><br>
        </div>

        <div class='flex'>
        <label class='main'>　　　住所　　</label>
            <?php if(!empty($_SESSION['addressError'])): ?>
            <p><?php echo $_SESSION['addressError'] ?></p>
            <?php endif; ?>
        <input type="text"  class='sub' name="address"placeholder="住所" value=""><br><br>
        </div>

        <div class='flex'>
        <label class='main'>　　　最寄り駅</label>
            <?php if(!empty($_SESSION['stationError'])): ?>
            <p><?php echo $_SESSION['stationError'] ?></p>
            <?php endif; ?>
        <input type="text"  class='sub' name="station"placeholder="最寄り駅" value=""><br><br>
        </div>

        <div class='flex'>
        <label class='main'>　　　取り組み　</label>
            <?php if(!empty($_SESSION['effortError'])): ?>
            <p><?php echo $_SESSION['effortError'] ?></p>
            <?php endif; ?>
        <textarea  class='sub' name="effort"></textarea><br><br>
        </div>
                
        <div class='flex'>
        <label class='main'>　　　URL　　</label>
            <?php if(!empty($_SESSION['URLError'])): ?>
            <p><?php echo $_SESSION['URLError'] ?></p>
            <?php endif; ?>
        <input type="text"  class='sub' name="URL"placeholder="URL" value=""><br><br>
        </div>

        <div id='center'>
        <input type="hidden" name="log" value="1">
        <input type="submit" value="登録" class='button'>
        <a href="#" onclick="history.back(-1)" class='btn'>戻る</a>
        </div>
    </form>
</div>

<script src="/js/script.js"></script>
<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>
</html>