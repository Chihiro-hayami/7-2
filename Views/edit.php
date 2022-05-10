<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$controller = new Controllers();
$params = $controller->view();
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
            $controller->update();
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
    <title>編集画面</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>

<div class='back'>
<form name="form" action="" method="POST" id="form">


        <label for="name" class='main'>　　　　飲食店名　　　</label>
        <div class='v1'><?php if (isset($errors['name'])) {
        echo $errors['name'];}?></div>
    <input type="text" class='sub1' name="name" value="<?php if($_POST) { //編集後の出力
        echo e($_POST['name']);
        } else { //編集前の出力
        echo $params['name'];}?>"><br><br>
    
        <label for="genre" class='main'>　　　　ジャンル　　　</label>
        <div class='v1'><?php if (isset($errors['genre'])) {
        echo $errors['genre'];}?></div>
    <input type="text" class='sub1' name="genre" value="<?php if($_POST) { //編集後の出力
        echo e($_POST['genre']);
        } else { //編集前の出力
        echo $params['genre'];}?>"><br><br>

        <label for="address" class='main'>　　　　住所　　　　　</label>
        <div class='v1'><?php if (isset($errors['address'])) {
        echo $errors['address'];}?></div>
    <input type="text" class='sub1' name="address" value="<?php if($_POST) { //編集後の出力
        echo e($_POST['address']);
        } else { //編集前の出力
        echo $params['address'];}?>"><br><br>

        <label for="station" class='main'>　　　　最寄り駅　　　</label>
        <div class='v1'><?php if (isset($errors['station'])) {
        echo $errors['station'];}?></div>
    <input type="text" class='sub1' name="station" value="<?php if($_POST) { //編集後の出力
        echo e($_POST['station']);
        } else { //編集前の出力
        echo $params['station'];}?>"><br><br>

        <label for="effort" class='main'>　　　　取り組み　　　</label>
        <div class='v1'><?php if (isset($errors['effort'])) {
        echo $errors['effort'];}?></div>
        <textarea class='sub3' name="effort"><?php if($_POST)
        {echo e($_POST['effort']);} else {echo $params['effort'];} ?></textarea><br><br>

        <label for="URL" class='main'>　　　　URL　　　　　</label>
        <div class='v1'><?php if (isset($errors['URL'])) {
        echo $errors['URL'];}?></div>
    <input type="text" class='sub1' name="URL" value="<?php if($_POST) { //編集後の出力
        echo e($_POST['URL']);
        } else { //編集前の出力
        echo $params['URL'];}?>"><br><br>

    <div id='center'>
    <button type="submit" class='button' onclick="return confirm('編集内容に間違いはないですか。')">編集</button>
    <a href="#" onclick="history.back(-1)" class='btn'>戻る</a>
    </div>
</form>
</div>


<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>

<script src="/js/script.js"></script>
</html>