<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Devedores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Cadastro</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=form-user">Adicionar Devedor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=list-user">Listar Devedor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?page=form-divida">Adicionar Dívida</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?page=list-divida">Listar Dívida</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <?php
        include("models/database.php");
        switch (@$_REQUEST["page"]) {

          case "form-user":
            include("views/form_devedores.php");
            break;
          case "list-user":
            include("views/list_devedores.php");
        
            break;
          case "form-divida":
            include("views/form_dividas.php");
            break;
          case "list-divida":
            include("views/list_dividas.php");
            break;
          case "salvar-devedor":
            include("controllers/devedor_controller.php");
            $devedorController = new devedorController();
            $devedorController->salvar();
            break;
          case "salvar-divida":
            include("controllers/divida_controller.php");
            break;
          default:
            echo "<h1>Bem-vindo ao sistema de Cadastro de Devedores e Dívidas</h1>";
            break;
        }

        ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>