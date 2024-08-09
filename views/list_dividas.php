<?php
include('./controllers/divida_controller.php');
$dividaController = new DividaController();
$dividas = $dividaController->ListarDivida();
?>
<h1>Lista de Dividas</h1>
<table class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th>Nome</th>
      <th>CPF/CNPJ</th>
      <th>Descrição</th>
      <th>Valor</th>
      <th>Vencimento</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($dividas)) : ?>
      <?php foreach ($dividas as $divida) : ?>
        <tr>
          <td><?php echo htmlspecialchars($divida['nome']); ?></td>
          <td><?php echo htmlspecialchars($divida['cpf_cnpj']); ?></td>
          <td><?php echo htmlspecialchars($divida['descricao']); ?></td>
          <td><?php echo htmlspecialchars(number_format($divida['valor'], 2, ',', '.')); ?></td>
          <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($divida['data_vencimento']))); ?></td>
          <td>
            <a href="?page=editar-divida&id=<?php echo $divida['id']; ?>" class="btn btn-success">Editar</a>
            <a href="?page=excluir-divida&id=<?php echo $divida['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta dívida?');">Excluir</a>

          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="6">Nenhuma dívida encontrada.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>