<?php
// include_once 'C:\xampp\htdocs\swtest_v1\Funcs.php';

abstract class ItemRepository implements Repository
{
  private $dbServername;
  private $dbUsername;
  private $dbPassword;
  private $dbName;

  public function __construct() {
    $this->dbServername = "localhost";
    $this->dbUsername = "root";
    $this->dbPassword = "";
    $this->dbName = "swtestdb";
    $charset = "utf8mb4";
  }

  // public function __construct($host, $user, $password, $db) {
  //   $this->dbServername = $host;
  //   $this->dbUsername = $user;
  //   $this->dbPassword = $password;
  //   $this->dbName = $db;
  //   $charset = "utf8mb4";
  // }

  public function connect() {
    // create connection w/ constructor data
    try {
      $dsn = "mysql:host=".$this->dbServername.";dbname=".$this->dbName.";charset=".$this->charset;
      $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }catch(PDOException $e) {
      echo "Connection failed: ".$e->getMessage();
    } 
  }

  protected function getRow() {
    $sql = "SELECT * FROM itemss";
    $result = ItemRepository::connect()->query($sql);
    // $arr = array();
    return $result->fetch();
  }
  protected function setRow($type, $name, $sku, $attritbute) {
    // SQL send product to db
  }
}

