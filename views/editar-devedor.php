<?php
include("controllers/devedor_controller.php");
$devedorController = new DevedorController();
$id = $_GET['id'];
$devedor = $devedorController->buscarId($id);
?>

<h1>Editar Devedor</h1>
<form action="?page=atualizar-devedor" method="post">
  <input type="hidden" name="id" value="<?php echo htmlspecialchars($devedor['id']); ?>">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($devedor['nome']); ?>">
  </div>
  <div class="mb-3">
    <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="<?php echo htmlspecialchars($devedor['cpf_cnpj']); ?>">
  </div>
  <div class="mb-3">
    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($devedor['data_nascimento']); ?>">
  </div>
  <div class="mb-3">
    <label for="endereco" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($devedor['endereco']); ?>">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>
