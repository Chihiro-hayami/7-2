<?php
function roleCheck() {
  if($_SESSION['role'] != 1) {
    header('Location:error.php');
  }
} 

function errorMsg($errorKey) {
  if(!empty($_SESSION[$errorKey])) {
    echo $_SESSION[$errorKey];
  }
}

function notNullEcho($value) {
  if(!empty($value)) {
    echo $value;
  }
} 

function nullCheck($value) {
  if(empty($value)) {
    return true;
  } else {
    return false;
  }
}

function integerCheck($value) {
  if(!preg_match("/^[0-9]+$/", $value)) {
    return true;
  } else {
    return false;
  }
}

function userValidate($user) {
  $_SESSION = array();
  foreach($user as $key=>$value) {
    $_POST[$key] = htmlspecialchars($value);
  }

  $reg_str = "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/";

  if(nullcheck($user['email'])) {
    $_SESSION['emailNullError'] = 'メールアドレスを入力してください<br>';
  }
  if(nullcheck($user['pass'])) {
    $_SESSION['passNullError'] = 'パスワードを入力してください<br>';
  }
  if(nullcheck($user['passCheck'])) {
    $_SESSION['passCheckNullError'] = '正しいパスワードを入力してください<br>';
  }
  if($user['pass'] != $user['passCheck']) {
    $_SESSION['passCheckError'] = 'パスワードが一致しません<br>';
  }
  if(!preg_match($reg_str, $user['email'])) {
    $_SESSION['mailFormatError'] = 'メールアドレスを入力してください<br>';
  }

  return empty($_SESSION);
}

function entryValidate($user) {
  $_SESSION = array();
  foreach($user as $key=>$value) {
    $_POST[$key] = htmlspecialchars($value);
  }

  if(nullcheck($user['name'])) {
    $_SESSION['nameNullError'] = '飲食店名を入力してください<br>';
  }
  if(nullcheck($user['genre'])) {
    $_SESSION['genreNullError'] = 'ジャンルを入力してください<br>';
  }
  if(nullcheck($user['address'])) {
    $_SESSION['addressNullError'] = '住所を入力してください<br>';
  }
  if(nullcheck($user['station'])) {
    $_SESSION['stationNullError'] = '最寄り駅を入力してください<br>';
  }
  if(nullcheck($user['effort'])) {
    $_SESSION['effortNullError'] = '取り組み内容を入力してください<br>';
  }
  if(nullcheck($user['URL'])) {
    $_SESSION['URLNullError'] = 'URLもしくはcommingsoonを入力してください<br>';
  }
  return empty($_SESSION);
}