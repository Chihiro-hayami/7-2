<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<meta charset="utf-8">
<title>管理ページ</title>
</head>


<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>
<div class='back' >

<div id='center'>
<h2>管理人ユーザーの追加が完了しました。</h2>
</div>        

<a href="admin.php"　class='btn'>管理ページに戻る</a>
</div>
<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>

<script src="/js/script.js"></script>
</html>