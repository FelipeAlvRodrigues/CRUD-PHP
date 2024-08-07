<?php
require_once('./models/database.php');
class Divida
{
  private $conection;

  public function __construct()
  {
    $database = new Database();
    $this->conection = $database->getConnection();
  }
  public function inserir($dados)
  {
    $stmt = $this->conection->prepare("INSERT INTO dividas (devedor_id, valor, descricao, data_vencimento) values (:devedor_id,:valor, :descricao, :data_vencimento )");
    $stmt->bindParam(':devedor_id', $dados['devedor_id']);
    $stmt->bindParam(':valor', $dados['valor']);
    $stmt->bindParam(':descricao', $dados['descricao']);
    $stmt->bindParam(':data_vencimento', $dados['data_vencimento']);
    return $stmt->execute();
  }
}
