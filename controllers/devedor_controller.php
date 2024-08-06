<?php
require_once('./models/devedor.php');

class DevedorController
{
  public function __construct()
  {
  }

  public function salvar()
  {

    $dados['nome'] = htmlspecialchars(trim($_POST['nome']));
    $dados['cpf_cnpj'] = htmlspecialchars(trim($_POST['cpf_cnpj']));
    $dados['data_nascimento'] = htmlspecialchars(trim($_POST['data_nascimento']));
    $dados['endereco'] = htmlspecialchars(trim($_POST['endereco']));
    $classDevedor = new Devedor();
    return $classDevedor->inserir($dados);
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
    $dados['id'] = htmlspecialchars(trim($_POST['id']));
    $dados['nome'] = htmlspecialchars(trim($_POST['nome']));
    $dados['cpf_cnpj'] = htmlspecialchars(trim($_POST['cpf_cnpj']));
    $dados['data_nascimento'] = htmlspecialchars(trim($_POST['data_nascimento']));
    $dados['endereco'] = htmlspecialchars(trim($_POST['endereco']));
    $classDevedor = new Devedor();
    return $classDevedor->atualizar($dados);
  }
  public function excluir()
  {
    $id = intval($_GET['id']);
    $classDevedor = new Devedor();
    $success = $classDevedor->excluir($id);
    if ($success) {
      header("Location: index.php?page=list-user&status=success&message=Devedor excluído com sucesso!");
      exit();
    } else {
      header("Location: index.php?page=list-user&status=error&message=Erro ao excluir o devedor. Tente novamente.");
      exit();
    }
  }
}
