<?php
require_once(ROOT_PATH . 'Controllers/Controller.php');

$restaurant = new Controllers;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors = [];
  if(empty($_POST['email'])) {
      $errors['email'] = '*メールアドレスは必須入力です。';
  }else{
      if(!preg_match('/\A[[:^cntrl:]]{1,100}\z/u', $_POST['email'])) {
      $errors['email'] = '*メールアドレスは100文字以内でご入力ください。';
  }}//メールアドレス

  if(count($errors) === 0){
      if(isset($_POST)){
        $restaurant->add_user();
      }
  }//エラーがなかったら登録
}
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
<title>管理人追加</title>
</head>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>

<div class='back'>
<form action="" method="post">
  <table>
    <tr>
      <td class='main'>メールアドレス</td>
      <div class='v2'><?php if (isset($errors['email'])) {
        echo $errors['email'];}?></div>
      <td class='sub'><input type="text" name="email"></input></td>
    </tr>

    <tr>
      <td class='main'>パスワード</td>

      <td class='sub'><input type="password" name="pass"></input></td>
    </tr>

    <tr>
      <td class='main'>確認用パスワード</td>

      <td class='sub'><input type="password" name="passCheck"></input></td>
    </tr>
  </table>
  <div id='center'>
  <input type="submit" value="登録" class='button'>
  <a href="#" onclick="history.back(-1)" class='btn'>戻る</a>
  </div>
</form>
</div>

<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>

<script src="/js/script.js"></script>
</html>