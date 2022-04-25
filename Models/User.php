<?php
require_once(ROOT_PATH.'/Models/Db.php');

Class User extends Db {
  private $table = 'users';

  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }
  //管理人追加
  public function add_user() {
    $sql = 'INSERT INTO '.$this->table.' (email, password) VALUE (:email, :password)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email', $_POST['email']);
    $sth->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  //ログイン
  public function login() {

    $sql = 'SELECT * FROM '.$this->table.' WHERE email = :email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email', $_POST['email']);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  //パスワード再設定
  public function reset() {
    $sql = 'UPDATE '.$this->table.' SET password = :password WHERE email = :email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email', $_POST['email']);
    $sth->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
} 