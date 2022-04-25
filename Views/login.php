<?php
require_once(ROOT_PATH . 'Controllers/Controller.php');

session_start();
$_SESSION = array();
session_destroy();
session_start();
$controller = new Controllers();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors = [];
  if(empty($_POST['email'])) {
      $errors['email'] = '*メールアドレスは必須入力です。';
  }else{
      if(!preg_match('/\A[[:^cntrl:]]{1,50}\z/u', $_POST['email'])) {
      $errors['email'] = '*50文字以内でご入力ください。';
  }}//飲食店名

  if(empty($_POST['password'])) {
      $errors['password'] = '*パスワードは必須入力です。';
  }else{
      if(!preg_match('/\A[[:^cntrl:]]{1,20}\z/u', $_POST['password'])) {
      $errors['password'] = '*20文字以内でご入力ください。';
  }}//ジャンル
  
  if(count($errors) === 0){
      if(isset($_POST)){
          $controller->login();
      }
  }
}

// POST送信されたときにログイン判定を行う
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
<title>ログイン</title>
</head>

<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>

<div class='back'>
<!-- ログインフォーム -->
<form action="" method="post">
  <table>
    <tr>
      <th class='main'>Email</th>
      <div class='v2'><?php if (isset($errors['email'])) {
        echo $errors['email'];}?></div>
      <td  class='sub'><input type="email" name="email"></input></td>
    </tr>
    <tr>
      <th class='main'>パスワード</th>
      <div class='v2'><?php if (isset($errors['password'])) {
        echo $errors['password'];}?></div>
      <td class='sub'><input type="password" name="password"></input></td>
    </tr>
  </table>
  <br><br><br>
  <input type="submit" value="ログイン" class='button'><br><br>
  <a href="reset.php" class='sub'>パスワードを忘れた場合はこちら</a>
</form>
</div>

<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>
<script src="/js/script.js"></script>
</html>