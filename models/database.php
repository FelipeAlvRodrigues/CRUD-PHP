<?php
class Database
{
  private $host = "localhost";
  private $db_name = "devedores";
  private $username = "root";
  private $password = "";
  public $conn;

  public function getConnection()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=localhost" . $this->host . ";dbname=devedores" . $this->db_name, $this->username, $this->password);
      $this->conn->exec("set names utf8");
    } catch (PDOException $exception) {
      echo "Erro na conexão " . $exception->getMessage();
    }
    return $this->conn;
  }
}
