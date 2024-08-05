<!-- require_once  -->
<?php
require_once('./models/database.php');

class Devedor
{
  private $conection;

  public function __construct()
  {
    $database = new database();
    $this->conection = $database->getConnection();
  }

  public function inserir($dados)
  {
    $stmt = $this->conection->prepare("INSERT INTO devedores (nome, cpf_cnpj, data_nascimento, endereco) values (:nome,:cpf_cnpj, :data_nascimento, :endereco )");
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':cpf_cnpj', $dados['cpf_cnpj']);
    $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
    $stmt->bindParam(':endereco', $dados['endereco']);
    $stmt->execute();
  }
}
?>