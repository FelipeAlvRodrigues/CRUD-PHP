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
    $classDevedor->inserir($dados);
  }
}
