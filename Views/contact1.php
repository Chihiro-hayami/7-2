<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$form = new Controllers();

function e($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

if($_POST) {
    $form->form();
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

    <form name="form" action="" method="POST">

        <label class='main'>ニックネーム</label><br><br>
        <input type="text" class='sub-form' name="name" placeholder="マヨネーズ大好き" value=""><br><br><br>

        <label class='main'>お問い合わせ内容</label><br><br>
        <textarea type="text"  class='sub-form' name="body" placeholder="例）わらび餅があるお店を追加してほしいです。" value=""></textarea><br><br>


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