<!DOCTYPE html>
<html lang="pt-br">
<title>Visualizar turma</title>

<?php
include('../../head.php');
?>

<body>

  <?php
  include('../../header.php');
  include('../../php/conexao.php');
  $codturma = addslashes($_GET['codturma']);

  $sql = "SELECT t.codturma, c.nome as curso,
  i.nome as instrutor, c.cargahoraria,
  date_format(datainicio, '%d/%m/%Y') as datainicio,
  date_format(datafim,'%d/%m/%Y') as datafim
  FROM turma t
  INNER JOIN instrutor i on t.instrutor = i.cpf 
  INNER JOIN curso c ON c.id = t.curso
  WHERE t.codturma = '$codturma'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo (' 
      
      <div style="margin-top: 130px;">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-lg-2">
          </div>
          <div class="col-md-8 col-lg-8">
            <div class="box">
              <div class="text-center icone">
                <i class="fa fa-users"></i>
                <br>
                <h5>Informações da turma ' . $row["codturma"] . '</h5>
              </div><br>
              <!-- Formulário -->
              <form method="POST" action="/SistemaGerar/php/cursogravar.php">
    
                <div class="form-group">
                  <label for="curso">Curso ministrado</label>
                  <h5>' . $row["curso"] . '</h5><br>
                </div>
    
                <div class="form-group">
                  <label for="descricao">Instrutor</label>
                  <h5>' . $row["instrutor"] . '</h5><br>
                </div>
    
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="cargahoraria">Carga horária</label>
                    <h5>' . $row["cargahoraria"] . ' h</h5>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="validade">Data início</label>
                    <h5>' . $row["datainicio"] . '</h5>
                  </div>
                  <div class="form-group col-md-4">
                  <label for="validade">Data fim</label>
                  <h5>' . $row["datafim"] . '</h5>
                </div>
                </div>
                <div class="modal-footer">
                <a class="btn btn-secondary" href="turma_consultar.php" role="button">Voltar</a>
                <a class="btn btn-danger" href="" onclick="excluirTurma(' . "'" . $row["codturma"] . "'" . ')" role="button">Apagar</a>
                <a class="btn btn-primary" href="turma_editar.php?codturma=' . $row["codturma"] . '" role="button">Editar</a>
              </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-2 col-lg-2">
          </div>
        </div>
      </div>');
    }
  } else {
    echo "<center><h5>Algo deu errado e o sistema não consegue exibir esses dados...</h5><center>";
  }

  $conn->close();
  ?>

  <br><br><br><br>

  <?php
  include('../../scripts.php');
  include('../../footer.php');
  $atualizado = $_GET['atualizado'];
  if ($atualizado == 'true') {
    echo ('<script>notify("Informações da turma <strong>atualizadas</strong> ", "success", 3000);</script>');
  }
  ?>

</body>

</html>