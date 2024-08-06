<?php
include("controllers/devedor_controller.php");
$devedorController = new DevedorController();
$devedores = $devedorController->listar();
?>

<h1>Lista de Devedores</h1>
<table class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CPF/CNPJ</th>
      <th>Data de Nascimento</th>
      <th>Endereço</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($devedores as $devedor) : ?>
      <tr>
        <td><?php echo htmlspecialchars($devedor['id']); ?></td>
        <td><?php echo htmlspecialchars($devedor['nome']); ?></td>
        <td><?php echo htmlspecialchars($devedor['cpf_cnpj']); ?></td>
        <td><?php echo htmlspecialchars($devedor['data_nascimento']); ?></td>
        <td><?php echo htmlspecialchars($devedor['endereco']); ?></td>
        <td>
        <a href="?page=editar-devedor&id=<?php echo $devedor['id']; ?>" class="btn btn-success">Editar</a>

          <button class="btn btn-danger">Excluir</button>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>