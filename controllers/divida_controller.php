<?php
require_once('./models/divida.php');

class DividaController
{
  public function SalvarDivida()
  {
    try {
      $dados['devedor_id'] = isset($_POST['devedor_id']) ? htmlspecialchars(trim($_POST['devedor_id'])) : null;
      $dados['descricao'] = isset($_POST['descricao']) ? htmlspecialchars(trim($_POST['descricao'])) : null;
      $dados['valor'] = isset($_POST['valor']) ? htmlspecialchars(trim($_POST['valor'])) : null;
      $dados['data_vencimento'] = isset($_POST['data_vencimento']) ? htmlspecialchars(trim($_POST['data_vencimento'])) : null;

      $classDivida = new Divida();
      $success = $classDivida->inserir($dados);

      if ($success) {
        header("Location: ?page=list-divida&status=success&message=" . urlencode("Dívida cadastrada com sucesso!"));
      } else {
        header("Location: ?page=form-divida&status=error&message=" . urlencode("Erro ao cadastrar a dívida. Tente novamente."));
      }
    } catch (Exception $e) {
      header("Location: ?page=form-divida&status=error&message=" . urlencode("Erro: " . $e->getMessage()));
    }
    exit();
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
    $id = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : null;
    try {
      $dados['id'] = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : null;
      $dados['devedor_id'] = isset($_POST['devedor_id']) ? htmlspecialchars(trim($_POST['devedor_id'])) : null;
      $dados['descricao'] = isset($_POST['descricao']) ? htmlspecialchars(trim($_POST['descricao'])) : null;
      $dados['valor'] = isset($_POST['valor']) ? htmlspecialchars(trim($_POST['valor'])) : null;
      $dados['data_vencimento'] = isset($_POST['data_vencimento']) ? htmlspecialchars(trim($_POST['data_vencimento'])) : null;

      $classDivida = new Divida();
      $success = $classDivida->AtualizarDivida($dados);

      if ($success) {
        header("Location: ?page=list-divida&status=success&message=" . urlencode("Dívida atualizada com sucesso!"));
      } else {
        header("Location: ?page=editar-divida&id=" . $id . "&status=error&message=" . urlencode("Erro ao atualizar a dívida. Tente novamente."));
      }
    } catch (Exception $e) {
      header("Location: ?page=editar-divida&id=" . $id . "&status=error&message=" . urlencode("Erro: " . $e->getMessage()));
    }
    exit();
  }
  public function ExcluirDivida()
  {
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;
    

    if ($id) {
      $classDivida = new Divida();
      if ($classDivida->ExcluirDivida($id)) {
        header("Location: ?page=list-divida&status=success&message=" . urlencode("Dívida excluída com sucesso!"));
      } else {
        header("Location: ?page=list-divida&status=error&message=" . urlencode("Erro ao excluir a dívida. Tente novamente."));
      }
    } else {
      header("Location: ?page=list-divida&status=error&message=" . urlencode("ID da dívida inválido."));
    }
    exit();
  }
}
