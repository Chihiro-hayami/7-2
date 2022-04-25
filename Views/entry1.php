<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$rest = new Controllers();
$params = $rest->index();

function e($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    if(empty($_POST['name'])) {
        $errors['name'] = '*飲食店名は必須入力です。';
    }else{
        if(!preg_match('/\A[[:^cntrl:]]{1,20}\z/u', $_POST['name'])) {
        $errors['name'] = '*20文字以内でご入力ください。';
    }}//飲食店名
    if(empty($_POST['genre'])) {
        $errors['genre'] = '*ジャンルは必須入力です。';
    }else{
        if(!preg_match('/\A[[:^cntrl:]]{1,20}\z/u', $_POST['genre'])) {
        $errors['genre'] = '*20文字以内でご入力ください。';
    }}//ジャンル
    if(empty($_POST['address'])) {
        $errors['address'] = '*住所は必須入力です。';
    }else{
        if(!preg_match('/\A[[:^cntrl:]]{1,30}\z/u', $_POST['address'])) {
        $errors['address'] = '*30文字以内でご入力ください。';
    }}//住所
    if(empty($_POST['station'])) {
        $errors['station'] = '*最寄り駅は必須入力です。';
    }else{
    if(!preg_match('/\A[[:^cntrl:]]{1,20}\z/u', $_POST['station'])) {
        $errors['station'] = '*20文字以内でご入力ください。';
    }}//最寄駅
    if(!strlen(trim($_POST['effort']))) {
        $errors['effort'] = '*取り組み内容は必須入力です。';
    }//取り組み内容
    if(empty($_POST['URL'])) {
        $errors['URL'] = '*URLもしくはcomingsoonを入力してください。';
    }else{
        if(!preg_match('/\A[[:^cntrl:]]{1,50}\z/u', $_POST['URL'])) {
        $errors['URL'] = '*50文字以内でご入力ください。';
    }}//ウェブサイト

    if(count($errors) === 0){
        if(isset($_POST)){
            $rest->insert();
        }
    }
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
<h1>飲食店登録</h1>

    <form name="form" action="conf.php" method="POST">

        <div class='flex'>
        <label class='main'>　　　飲食店名</label>
        <div class='v1'><?php if (isset($errors['name'])) {
        echo $errors['name'];}?></div>
        <input type="text" class='sub' name="name"placeholder="飲食店名" value=""><br><br>
        </div>

        <div class='flex'>
        <label class='main'>　　　ジャンル</label>
        <div class='v1'><?php if (isset($errors['genre'])) {
        echo $errors['genre'];}?></div>
        <input type="text"  class='sub' name="genre"placeholder="ジャンル" value=""><br><br>
        </div>

        <div class='flex'>
        <label class='main'>　　　住所　　</label>
        <div class='v1'><?php if (isset($errors['address'])) {
        echo $errors['address'];}?></div>
        <input type="text"  class='sub' name="address"placeholder="住所" value=""><br><br>
        </div>

        <div class='flex'>
        <label class='main'>　　　最寄り駅</label>
        <div class='v1'><?php if (isset($errors['station'])) {
        echo $errors['station'];}?></div>
        <input type="text"  class='sub' name="station"placeholder="最寄り駅" value=""><br><br>
        </div>

        <div class='flex'>
        <label class='main'>　　　取り組み　</label>
        <div class='v1'><?php if (isset($errors['effort'])) {
        echo $errors['effort'];}?></div>
        <textarea  class='sub' name="effort"></textarea><br><br>
        </div>
                
        <div class='flex'>
        <label class='main'>　　　URL　　</label>
        <div class='v1'><?php if (isset($errors['URL'])) {
        echo $errors['URL'];}?></div>
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