<?php
include("controllers/divida_controller.php");
$dividaController = new DividaController();
$id = isset($_GET['id']) ? $_GET['id'] : null;
$dividaAtual = $dividaController->BuscarId($id);

?>
<div class="container">
  <h2 class="mt-4">Editar Dívida</h2>
  <form action="?page=atualizar-divida" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($dividaAtual['id']); ?>">
    <div class="form-group">
      <label for="devedor_id">Devedor ID</label>
      <input type="number" class="form-control" id="devedor_id" name="devedor_id" value="<?php echo htmlspecialchars($dividaAtual['devedor_id']); ?>" required>
    </div>
    <div class="form-group">
      <label for="descricao">Descrição do Título</label>
      <textarea class="form-control" id="descricao" name="descricao"><?php echo htmlspecialchars($dividaAtual['descricao']); ?></textarea>
    </div>
    <div class="form-group">
      <label for="valor">Valor</label>
      <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="<?php echo htmlspecialchars($dividaAtual['valor']); ?>" required>
    </div>
    <div class="form-group">
      <label for="data_vencimento">Data de Vencimento</label>
      <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="<?php echo htmlspecialchars($dividaAtual['data_vencimento']); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
</div>