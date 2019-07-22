<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');

include('../../php/conexao.php');

$termo = $_POST['pesquisa'];

$sql = "SELECT * FROM curso";

$result = $conn->query($sql);

?>

<body>

  <?php
  include('../../header.php');
  ?>

  <div style="margin-top: 130px;">
  </div>

  <div class="col">
    <div class="row">
      <div class="col-md-2 col-lg-2">
      </div>
      <div class="col-md-8 col-lg-8">
        <div class="box">
          <form method="POST" action="curso_consultar.php">
            <div class="row">
              <div class="col-sm-8 col-md-10 col-lg-10">
                <input type="text" name="pesquisa" class="form-control" placeholder="Digite aqui">
              </div>
              <div class="col-sm-4 col-lg-2 col-md-2" align="center">
                <button type="submit" class="btn btn-primary left">Pesquisar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-2 col-lg-2">
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <br>
      <?php
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo ('
        <div class="col-lg-4 col-sm-12">
        <div class="card">
          <h5 class="card-header">' . $row["nome"] . '</h5>
          <div class="card-body">
            <p class="card-text">' . $row["descricao"] . '</p>
            <hr>
            <div class="text-right">
            <a class="btn btn-primary" href="curso_visualizar.php?id=' . $row["id"] . '" role="button" ><i class="fa fa-search" title="Visualizar informações completas" aria-hidden="true"></i></a>
              <a class="btn btn-primary" href="curso_editar.php?id=' . $row["id"] . '" role="button"><i class="fa fa-pencil" title="Editar dados" aria-hidden="true"></i></a>
              <a class="btn btn-danger" href="#" onclick="excluirCurso(' . $row["id"] . ')" role="button"><i class="fa fa-trash" title="Apagar" aria-hidden="true"></i></a>
            </div>         
              </div>
        </div><br>
      </div>
        ');
        }
      } else {
        echo ('<h3>Sem resultados</h3>');
      }

      ?>

    </div>
  </div>

  <?php
  include('../../scripts.php');
  $conn->close();
  $cnpj = $_GET['cnpj'];
  if ($cnpj == 'apagado') {
    echo ('<script>notify("empresa<strong> excluída</strong> com sucesso", "danger", 5000);</script>');
  }
  ?>

</body>

</html>