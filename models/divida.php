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
  public function ListarDivida()
  {
    $stmt = $this->conection->prepare("SELECT dividas.id, devedores.nome, devedores.cpf_cnpj, dividas.descricao, dividas.valor, dividas.valor, dividas.data_vencimento, dividas.updated_at FROM dividas JOIN devedores ON dividas.devedor_id = devedores.id ORDER BY dividas.data_vencimento ASC ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
