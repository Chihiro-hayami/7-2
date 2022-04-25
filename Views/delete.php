<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
// データベース定義
//define('DB_HOST', 'localhost'); // データベースのホスト名またはIPアドレス
//define('DB_USER', 'root'); // MySQLのユーザ名
define('DB_PASS', 'root'); // MySQLのパスワード
//define('DB_NAME', 'restaurant'); // データベース名
ini_set('display_errors', true);

// DB接続テスト
function connect(){
    $host = DB_HOST;
    $db = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;
    
    $dsn = "mysql:host=$host;dbname=$db";
    
    try{
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    }catch(PDOException $e){
        echo '接続失敗です！'. $e->getMessage();
        exit();
    }
}

$id = $_GET['id'];

function delete($id){
    $return = false;
    
    $sql = 'DELETE FROM restaurant WHERE id = ?';

    $arr = [];
    $arr[] = $id;

    try{
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    }catch(\Exception $e){
      return $result;
    }
  }

  delete($id)
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
<title>削除</title>
</head>

<body>
<?php  include ( dirname(__FILE__) . '/header.php' ); ?>

<div class='back'>
<h1>削除が完了しました。</h1>
<p><a href="admin.php" class='btn'>トップへ戻る</a></p>
</div>

<?php  include ( dirname(__FILE__) . '/footer.php' ); ?>
</body>

<script src="/js/script.js"></script>
</html>