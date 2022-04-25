<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Restaurant extends Db{
  private $table = 'restaurant';
  public function __construct($dbh = null){
    parent::__construct($dbh);
  }
  /**
   * restaurantテーブルからすべてデータを取得 (20件ごと)
   *
   * @param integer $page ページ番号
   * @return Array $result (20件ごと)
   */
  public function findAll($page = 0):Array{
    $sql = 'SELECT * FROM restaurant';
    $sql .= ' LIMIT 20 OFFSET '.(20 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * restaurantテーブルから全データ数を取得
   *
   * @return Int $count 件数
   */
  public function countAll():Int{
    $sql = 'SELECT count(*) as count FROM restaurant';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
  }

  /**
   * restaurantテーブルから指定idに一致するデータを取得
   *
   * @param integer $id 飲食店のID
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
  public function view() {
    $sql = 'SELECT * FROM '.$this->table.' WHERE id = '.$_GET['id'];
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  //追加
  public function insert() {
    $sql = 'INSERT INTO restaurant (name,genre,address,station,effort,URL,created_at)
        VALUES (:name,:genre,:address,:station,:effort,:URL, current_timestamp())';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':name', $_POST['name'],  PDO::PARAM_STR);
    $sth->bindParam(':genre', $_POST['genre'],  PDO::PARAM_STR);
    $sth->bindParam(':address', $_POST['address'],  PDO::PARAM_STR);
    $sth->bindParam(':station', $_POST['station'],  PDO::PARAM_STR);
    $sth->bindParam(':effort', $_POST['effort'],  PDO::PARAM_STR);
    $sth->bindParam(':URL', $_POST['URL'],  PDO::PARAM_STR);
    $result = $sth->execute();
    return $result;
  }

  //削除
  public function delete($id) {
    $sql = 'DELETE FROM restaurant WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  //編集
  public function update() {
    $sql = ' UPDATE '. $this->table. ' SET 
    name = :name,
    genre = :genre,
    address = :address,
    station = :station,
    effort = :effort,
    URL = :URL,
    created_at = current_timestamp()
    WHERE id = '.$_GET['id'];
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':name', $_POST['name'],  PDO::PARAM_STR);
    $sth->bindParam(':genre', $_POST['genre'],  PDO::PARAM_STR);
    $sth->bindParam(':address', $_POST['address'],  PDO::PARAM_STR);
    $sth->bindParam(':station', $_POST['station'],  PDO::PARAM_STR);
    $sth->bindParam(':effort', $_POST['effort'],  PDO::PARAM_STR);
    $sth->bindParam(':URL', $_POST['URL'],  PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
}
?>
