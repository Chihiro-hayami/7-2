<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Form extends Db{
  private $table = 'form';
  public function __construct($dbh = null){
    parent::__construct($dbh);
  }
  /**
   * formテーブルからすべてデータを取得 (20件ごと)
   *
   * @param integer $page ページ番号
   * @return Array $result (20件ごと)
   */
  public function findAll($page = 0):Array{
    $sql = 'SELECT * FROM form';
    $sql .= ' LIMIT 20 OFFSET '.(20 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * formテーブルから全データ数を取得
   *
   * @return Int $count 件数
   */
  public function countAll():Int{
    $sql = 'SELECT count(*) as count FROM form';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
  }

  /**
   * formテーブルから指定idに一致するデータを取得
   *
   * @param integer $id　お問い合わせのID
   * @return Array $result  指定のデータ
   */

  public function findById($id = 0):Array{
    $sql = 'SELECT * FROM '.$this->table;
    $sql .= ' WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  //詳細
  public function contact() {
    $sql = 'SELECT * FROM '.$this->table.' WHERE id = '.$_GET['id'];
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  //追加
  public function form() {
    $sql = 'INSERT INTO form (name,body)
        VALUES (:name,:body)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':name', $_POST['name'],  PDO::PARAM_STR);
    $sth->bindParam(':body', $_POST['body'],  PDO::PARAM_STR);
    $result = $sth->execute();
    return $result;
  }
}
?>
