<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$rest = new Controllers();
$params = $rest->index();
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
<script>
function f() {
var e = document.getElementById("AAA");
var data = parseInt(e.innerHTML);
data++;
e.innerHTML = data;
}

</script>
<title>飲食店一覧</title>
</head>

<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>

<div class='back'>
<br>
<h1 id='center'>飲食店一覧</h1>
<h3 id='center'>アレルギー対策に理解を深めるための取り組みをしている飲食店一覧です。<br>
エキス不可などをしっかりと理解し料理を提供しているお店を取材しまとめました。
</h3>
<!--<h5 id='center'>サイトのどこかにお店でサービスを受けられる隠しコメントが。。。！？</h5>-->
  <?php foreach($params as $param): ?>
    <div class='flex'>
      <div class='main'>　　　＊<?= $param['name'] ?></div>
      <a href="view.php?id=<?= $param['id'] ?>" class='button'>　詳細　</a>
    </div>
  <?php endforeach; ?>
  <!--<div id='center'>この取り組みを応援する　<button id='test'>　Push　</button><span id="AAA" onclick="f();">1</span></div>-->
</div>

<div　id='center' class=hide style="color: #fff;">「このサイトを見た！」で各店舗いろんなプレゼントがあります♪</div>

<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>
</html>
