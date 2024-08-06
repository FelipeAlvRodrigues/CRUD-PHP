
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
    try {
      $this->conection->beginTransaction();

      $stmt = $this->conection->prepare("INSERT INTO devedores (nome, cpf_cnpj, data_nascimento, endereco) values (:nome,:cpf_cnpj, :data_nascimento, :endereco )");
      $stmt->bindParam(':nome', $dados['nome']);
      $stmt->bindParam(':cpf_cnpj', $dados['cpf_cnpj']);
      $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
      $stmt->bindParam(':endereco', $dados['endereco']);

      if ($stmt->execute()) {
        $this->conection->commit();
        return true;
      } else {
        $this->conection->rollBack();
        return false;
      }
    } catch (PDOException $e) {
      $this->conection->rollBack();
      echo "Erro: " . $e->getMessage();
      return false;
    }
  }

  public function listar()
  {
    $stmt = $this->conection->prepare("SELECT * FROM devedores");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function buscarId($id)
  {
    $stmt = $this->conection->prepare("SELECT * FROM devedores WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function atualizar($dados)
  {
    try {
      $this->conection->beginTransaction();

      $stmt = $this->conection->prepare("UPDATE devedores SET nome = :nome, cpf_cnpj = :cpf_cnpj, data_nascimento = :data_nascimento, endereco = :endereco WHERE id = :id");
      $stmt->bindParam(':id', $dados['id'], PDO::PARAM_INT);
      $stmt->bindParam(':nome', $dados['nome']);
      $stmt->bindParam(':cpf_cnpj', $dados['cpf_cnpj']);
      $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
      $stmt->bindParam(':endereco', $dados['endereco']);


      if ($stmt->execute()) {
        $this->conection->commit();
        return true;
      } else {
        $this->conection->rollBack();
        return false;
      }
    } catch (PDOException $e) {
      $this->conection->rollBack();
      echo "Erro: " . $e->getMessage();
      return false;
    }
  }
}
?>