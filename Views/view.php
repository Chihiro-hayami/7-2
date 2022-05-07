<?php
require_once(ROOT_PATH . 'Controllers/Controller.php');
$rest = new Controllers();
$params = $rest->view();
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
<title>飲食店一覧</title>
</head>

<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>

<div class='back'>
<div class="table-div">
  <h1>飲食店詳細</h1>
  <table>

    <tr>
      <td class='main'>No.</td>
      <td class='sub'><?=$params['id'] ?></td>
    </tr>

    <tr>
      <td class='main'>店名</td>
      <td class='sub'><?=$params['name'] ?></td>
    </tr>

    <tr>
      <td class='main'>ジャンル</td>
      <td class='sub'><?=$params['genre'] ?></td>
    </tr>

    <tr>
      <td class='main'>住所</td>
      <td class='sub'><?=$params['address'] ?></td>
    </tr>

    <tr>
      <td class='main'>最寄駅</td>
      <td class='sub'><?=$params['station'] ?></td>
    </tr>

    <tr>
      <td class='main' id='effort'>取り組み</td>
      <td class='sub'><?=$params['effort'] ?></td>
    </tr>

    <tr>
      <td class='main'>サイト</td>
      <td class='sub'><?=$params['URL'] ?></td>
    </tr>

    <tr>
      <td class='main'>登録日</td>
      <td class='sub'><?=$params['created_at'] ?></td>
    </tr>
  </table>
</div>

<div id='center'><a href="#" onclick="history.back(-1)" class='btn'>戻る</a></div>
</div>

<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>
<script src="/js/script.js"></script>
</html>
