<?php
require_once('./models/divida.php');
$dividaController = new DividaController();
$dividaController->SalvarDivida();
class DividaController
{
  public function SalvarDivida()
  {
    $dados['devedor_id'] = htmlspecialchars(trim($_POST['devedor_id']));
    $dados['descricao'] = htmlspecialchars(trim($_POST['descricao']));
    $dados['valor'] = htmlspecialchars(trim($_POST['valor']));
    $dados['data_vencimento'] = htmlspecialchars(trim($_POST['data_vencimento']));
    $classDivida = new Divida();
    return $classDivida->inserir($dados);
  }
}
