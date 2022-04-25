<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$rest = new controllers();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <?php include (dirname(__FILE__) . '/validation.php'); ?>
</head>

<body>
    <?php 
        session_start();
        if(validation($_POST)){
            header('Location: entry.php');
        } else {
            $rest->insert();
        }
    ?>

<h1>入力確認</h1>

<form action="entry2.php" class="send" method="POST">

    <p>氏名</p>
    <p><?=$_POST["name"]?></p>
    <input type="hidden" name="name" value=<?=$_POST["name"]?>>

    <p>ジャンル</p>
    <p><?=$_POST["genre"]?></p>
    <input type="hidden" name="genre" value=<?=$_POST["genre"]?>>

    <p>住所</p>
    <p><?=$_POST["address"]?></p>
    <input type="hidden" name="address" value=<?=$_POST["address"]?>>

    <p>最寄り駅</p>
    <p><?=$_POST["station"]?></p>
    <input type="hidden" name="station" value=<?=$_POST["station"]?>>

    <p>お問い合わせ内容</p>
    <p style="word-break: break-all"><?php echo nl2br($_POST["effort"]);?></p>
    <input type="hidden" name="effort" value=<?=$_POST["effort"]?>>

    <p>URL</p>
    <p><?=$_POST["URL"]?></p>
    <input type="hidden" name="URL" value=<?=$_POST["URL"]?>>

    <input type="hidden" name="log" value=<?=$_POST["log"]?>>
    <input type="submit" id="send" value="送　信"></input>
    <a href="javascript:history.back();" class="back">戻　る</a>

</form>

<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>

<script src="/js/script.js"></script>
</html>