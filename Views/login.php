<?php
require_once(ROOT_PATH . 'Controllers/Controller.php');
require_once(ROOT_PATH . 'function.php');

session_start();
$_SESSION = array();
session_destroy();
session_start();
$controller = new Controllers();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $error = [];

  if(empty($_POST['email'])){
      $error['email'] = 'メールアドレスは必須入力です';
  }else{
      $pattern = '/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/uiD';
      if (!preg_match($pattern, $_POST['email'])){
          $error['email'] = 'メールアドレスを正しく入力してください。';
      }
  }
  
  if(empty($_POST['password'])){
      $error['password'] = 'パスワードは必須入力です';
  } else {
      $pattern = '/\A[a-z\d]{0,100}+\z/i';
      if (!preg_match($pattern, $_POST['password'])){
          $error['password'] = 'パスワードを正しく入力してください。';
      }
  }

  if(empty($_POST['passCheck'])){
      $error['passCheck'] = '確認パスワードは必須入力です';
  } else {
      if($_POST['password'] != $_POST['passCheck']){
          $error['passCheck'] = 'パスワードが一致していません。';
      }
  }

  if(count($error) === 0){
      if(isset($_POST)){
          $users->reset();
      }
  }
}

if($_POST) {
  $controller->login();
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
      <td  class='sub'><input type="email" name="email"></input></td>
    </tr>
    <tr>
      <th class='main'>パスワード</th>
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