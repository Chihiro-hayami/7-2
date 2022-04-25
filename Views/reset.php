<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$controller = new Controllers();

session_start();
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
        $pattern = '/\A[a-z\d]{0,255}+\z/i';
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
            $controller->reset();
        }
    }
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
<title>パスワード再発行</title>
</head>

<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>

<div class='back'>
<!-- 再設定フォーム -->
<form action="" method="post">
  <table>
    <tr>
      <th class='main'>Email</th>
      <td class='sub'><input type="email" name="email"></input></td>
    </tr>
    <tr>
      <th class='main'>パスワード</th>
      <td class='sub'><input type="password" name="password"></input></td>
    </tr>
    <tr>
      <td class='main'>確認用パスワード</td>
      <td class='sub'><input type="text" name="passCheck"></input></td>
    </tr>
  </table>
  <div id='center'>
  <input class='btn' type="submit" value="　再　設　定　">
  </div>
</form>
</div>

<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>
<script src="/js/script.js"></script>
</html>