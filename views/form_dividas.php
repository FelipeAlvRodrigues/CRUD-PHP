<div class="container">
  <h2 class="mt-4">Cadastro de Dívida</h2>
  <form action="?page=salvar-divida" method="post">
    <div class="form-group">
      <label for="devedor_id">Devedor ID</label>
      <input type="number" class="form-control" id="devedor_id" name="devedor_id" required>
    </div>
    <div class="form-group">
      <label for="descricao">Descrição do Título</label>
      <textarea class="form-control" id="descricao" name="descricao"></textarea>
    </div>
    <div class="form-group">
      <label for="valor">Valor</label>
      <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
    </div>
    <div class="form-group">
      <label for="data_vencimento">Data de Vencimento</label>
      <input type="date" class="form-control" id="data_vencimento" name="data_vencimento">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>