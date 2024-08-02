<div class="container">
  <h2 class="mt-4">Cadastro de Devedor</h2>
  <form action="?page=salvar-devedor" method="post">
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="form-group">
      <label for="cpf_cnpj">CPF/CNPJ</label>
      <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" required>
    </div>
    <div class="form-group">
      <label for="data_nascimento">Data de Nascimento</label>
      <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
    </div>
    <div class="form-group">
      <label for="endereco">Endereço</label>
      <input type="text" class="form-control" id="endereco" name="endereco">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>