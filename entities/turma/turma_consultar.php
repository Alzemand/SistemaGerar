<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');

include('../../php/conexao.php');

$termo = $_POST['pesquisa'];

$sql = "SELECT t.codturma, c.nome as curso,
i.nome as instrutor,
date_format(datainicio, '%d/%m/%Y') as datainicio,
date_format(datafim,'%d/%m/%Y') as datafim
FROM turma t
INNER JOIN instrutor i on t.instrutor = i.cpf 
INNER JOIN curso c ON c.id = t.curso
WHERE i.nome LIKE '%$termo%'
or c.nome LIKE '%$termo%'";

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
          <form method="POST" action="turma_consultar.php">
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
          <h5 class="card-header">' . $row["codturma"] . '</h5>
          <div class="card-body">
            <h6><b>Curso:</b> ' . $row["curso"] . '</h6>
            <h6><b>Instrutor:</b> ' . $row["instrutor"] . '</h6>
            <h6><b>Data:</b> ' . $row["datainicio"] . ' a ' . $row["datainicio"] . '</h6>
            <hr>
            <div class="text-right">
              <a class="btn btn-success" href="#" onclick="fecharTurma(' . "'" . $row["codturma"] . "'" . ')" role="button"><i class="fa fa-check" title="Encerrar" aria-hidden="true"></i></a>
              <a class="btn btn-primary" href="turma_visualizar.php?codturma=' . $row["codturma"] . '" role="button" ><i class="fa fa-search" title="Visualizar informações completas" aria-hidden="true"></i></a>
              <a class="btn btn-primary" href="turma_editar.php?codturma=' . $row["codturma"] . '" role="button"><i class="fa fa-pencil" title="Editar dados" aria-hidden="true"></i></a>
              <a class="btn btn-danger" href="#" onclick="excluirTurma(' . "'" . $row["codturma"] . "'" . ')" role="button"><i class="fa fa-trash" title="Apagar" aria-hidden="true"></i></a>
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

  $codturma = $_GET['codturma'];
  if ($codturma == 'apagado') {
    echo ('<script>notify("Turma<strong> excluída</strong> com sucesso", "danger", 3000);</script>');
  }
  ?>

</body>

</html>