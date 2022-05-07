<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$contact = new Controllers();
$params = $contact->contact();
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
<title>お問い合わせ一覧</title>
</head>


<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>


<div class='back' >
        <h1>お問い合わせ</h1>
        <table class='cont'>
            <tr>
                <th id='initial' class='main2'>ニックネーム</th>
                <th id='initial' class='main2'>問合せ内容</th>
            </tr>
            <?php foreach ($params as $param): ?>
                <tr>
                    <td id='initial' class='sub2'>　　<?= ($param['name']); ?>　　　　</td>
                    <td id='initial' class='sub2'>　　<?= ($param['body']); ?>　　　　</td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="#" onclick="history.back(-1)" class='btn'>戻る</a>
</div>
</div>
<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>

<script src="/js/script.js"></script>
</html>