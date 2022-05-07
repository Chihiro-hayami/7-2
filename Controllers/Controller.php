<?php
require_once(ROOT_PATH .'/Models/Db.php');
require_once(ROOT_PATH .'/Models/Restaurant.php');
require_once(ROOT_PATH .'/Models/User.php');
require_once(ROOT_PATH .'/Models/Form.php');

class Controllers {
  private $request;//リクエストパラメーター(GET,POST)
  private $Restaurant;//Restaurantモデル
  private $User;//Userモデル
  private $Form;//Formモデル

  public function __construct(){
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;

    $this->Restaurant = new Restaurant();

    $dbh = $this->Restaurant->get_db_handler();
    $this->User = new User($dbh);
    $this->Form = new Form($dbh);
  }

  //飲食店データ一覧
  public function index() {
    $restaurants = $this->Restaurant->findAll();
    return $restaurants;
  }

  //飲食店詳細ページ
  public function view() {
    $view = $this->Restaurant->view();
    return $view;
  }

  //ログイン
  public function login() {
    $error = [];
    if($_POST['email'] != "" && $_POST['password'] != ""){
      $login = $this->User->login();

      if($login != false){
        if(password_verify($_POST['password'], $login['password'])){
          session_regenerate_id();
          header('Location: ./admin.php');
          $_SESSION['id'] = $login['id'];
        } else {
          $error['failed'] = 'パスワードが正しくありません。';
          return $error;
        }

      } else {
        $error['failed'] = '入力が正しくありません。';
        return $error;
      }
    } else {
      $error['blank'] = '入力されていない項目があります。';
      return $error;
    }
  }

  //管理人追加
  public function add_user() {
    $add_user = $this->User->add_user();
    header('Location: add_comp.php');
    return $add_user;
  }

  //パスワード再設定
  public function reset() {
    $error = [];
    if($_POST['email'] != "" && $_POST['password'] != ""){
    $reset = $this->User->login(); 

      if($reset != false){
        $this->User->reset();
        header('Location: login.php');
      } else {
        $error['failed'] = '入力が正しくありません。';
        return $error;
      }
    } else {
      $error['blank'] = '入力されていない項目があります。';
      return $error;
    } 
  }

  //お問い合わせ
  public function form() {
    $form = $this->Form->form();
    header('Location: contact2.php');
    return $form;
  }

  //お問い合わせデータ一覧
  public function contact() {
    $forms = $this->Form->findall();
    return $forms;
  }

  //飲食店追加
  public function insert() {
    $insert = $this->Restaurant->insert();
    header('Location: entry2.php');
    return $insert;
  }

  //飲食店削除
  public function delete($id) {
    $delete = $this->Restaurant->delete($id);
    header('Location: delete.php');
    return $delete;
  }

  //飲食店編集
  public function update() {
    $update = $this->Restaurant->update();
    header('Location: admin.php');
    return $update;
  }
}
?>
