<?php
require_once('./models/divida.php');
$dividaController = new DividaController();
$dividaController->SalvarDivida();
class DividaController
{
  public function SalvarDivida()
  {
    $dados['devedor_id'] = isset($_POST['devedor_id']) ? htmlspecialchars(trim($_POST['devedor_id'])) : null;
    $dados['descricao'] = isset($_POST['descricao']) ? htmlspecialchars(trim($_POST['descricao'])) : null;
    $dados['valor'] = isset($_POST['valor']) ? htmlspecialchars(trim($_POST['valor'])) : null;
    $dados['data_vencimento'] = isset($_POST['data_vencimento']) ? htmlspecialchars(trim($_POST['data_vencimento'])) : null;

    $classDivida = new Divida();
    return $classDivida->inserir($dados);
  }
  public function ListarDivida()
  {
    $classDivida = new Divida();
    return $classDivida->ListarDivida();
  }
  public function BuscarId($id)
  {
    $classDivida = new Divida();
    return $classDivida->BuscarId($id);
  }
  public function AtualizarDivida()
  {
    $dados['id'] = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : null;
    $dados['devedor_id'] = isset($_POST['devedor_id']) ? htmlspecialchars(trim($_POST['devedor_id'])) : null;
    $dados['descricao'] = isset($_POST['descricao']) ? htmlspecialchars(trim($_POST['descricao'])) : null;
    $dados['valor'] = isset($_POST['valor']) ? htmlspecialchars(trim($_POST['valor'])) : null;
    $dados['data_vencimento'] = isset($_POST['data_vencimento']) ? htmlspecialchars(trim($_POST['data_vencimento'])) : null;

    $classDivida = new Divida();
    return $classDivida->AtualizarDivida($dados);
    if ($classDivida->AtualizarDivida($dados)) {
      header("Location: ?page=list-divida");
      exit;
    } else {
      echo "<div class='alert alert-danger'>Erro ao atualizar a dívida. Tente novamente.</div>";
    }
  }
}
