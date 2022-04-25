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
<title>管理ページ</title>
</head>


<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>


<div class='back' >
        <h1>飲食店一覧</h1>
        <div class='flex' id='bottom'>
        <a href="entry1.php" class='button'>飲食店追加</a>
        <a href="addUser.php" class='button'>管理人追加</a>
        </div>
        <table>
            <tr>
                <th class='main'>飲食店名</th>
            </tr>
            <?php foreach ($params as $param): ?>
                <tr>
                    <td class='main'>　　<?= ($param['name']); ?>　　　　</td>
                    <td class='button' id='right'><a href="edit.php?id=<?= $param['id']; ?>">編集</a></td>
                    <td class='button'><a href="delete.php?id=<?= $param['id']; ?>" onclick="return confirm('本当に削除してよろしいですか？')">削除</a></td>
                </tr>
            <?php endforeach; ?>

        </table>
</div>
</div>
<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>

<script src="/js/script.js"></script>
</html>