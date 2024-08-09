<?php
require_once('./models/devedor.php');

class DevedorController
{
  public function __construct() {}

  public function salvar()
  {
    try {
      $dados['nome'] = htmlspecialchars(trim($_POST['nome']));
      $dados['cpf_cnpj'] = htmlspecialchars(trim($_POST['cpf_cnpj']));
      $dados['data_nascimento'] = htmlspecialchars(trim($_POST['data_nascimento']));
      $dados['endereco'] = htmlspecialchars(trim($_POST['endereco']));
      $classDevedor = new Devedor();
      $success = $classDevedor->inserir($dados);

      if ($success) {
        header("Location: index.php?page=list-user&status=success&message=" . urlencode("Devedor cadastrado com sucesso!"));
      } else {
        header("Location: index.php?page=form-user&status=error&message=" . urlencode("Erro ao cadastrar o devedor. Tente novamente."));
      }
    } catch (Exception $e) {
      header("Location: index.php?page=form-user&status=error&message=" . urlencode("Erro: " . $e->getMessage()));
    }
    exit();
  }
  public function listar()
  {
    $classDevedor = new Devedor();
    return $classDevedor->listar();
  }

  public function buscarId($id)
  {
    $classDevedor = new Devedor();
    return $classDevedor->buscarId($id);
  }
  public function atualizar()
  {
    $id = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : null;
    try {
      $dados['id'] = htmlspecialchars(trim($_POST['id']));
      $dados['nome'] = htmlspecialchars(trim($_POST['nome']));
      $dados['cpf_cnpj'] = htmlspecialchars(trim($_POST['cpf_cnpj']));
      $dados['data_nascimento'] = htmlspecialchars(trim($_POST['data_nascimento']));
      $dados['endereco'] = htmlspecialchars(trim($_POST['endereco']));
      $classDevedor = new Devedor();
      $success = $classDevedor->atualizar($dados);

      if ($success) {
        header("Location: index.php?page=list-user&status=success&message=" . urlencode("Atualização realizada com sucesso!"));
      } else {
        header("Location: index.php?page=editar-devedor&id=" . $id . "&status=error&message=" . urlencode("Erro ao atualizar o devedor. Tente novamente."));
      }
    } catch (Exception $e) {
      header("Location: index.php?page=editar-devedor&id=" . $id . "&status=error&message=" . urlencode("Erro: " . $e->getMessage()));
    }
    exit();
  }
  public function excluir()
  {
    try {
      $id = intval($_GET['id']);
      $classDevedor = new Devedor();
      $success = $classDevedor->excluir($id);
      if ($success) {
        header("Location: index.php?page=list-user&status=success&message=" . urlencode("Devedor excluído com sucesso!"));
      } else {
        header("Location: index.php?page=list-user&status=error&message=" . urlencode("Erro ao excluir o devedor. Tente novamente."));
      }
    } catch (Exception $e) {
      header("Location: index.php?page=list-user&status=error&message=" . urlencode("Erro: " . $e->getMessage()));
    }
    exit();
  }
}
