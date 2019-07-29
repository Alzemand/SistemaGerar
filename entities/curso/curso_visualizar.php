<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
?>

<body>

  <?php
  include('../../header.php');
  include('../../php/conexao.php');
  $id = addslashes($_GET['id']);

  $sql = "SELECT * FROM curso WHERE id='$id'";
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
            <i class="fa fa-book"></i>
            <br>
            <h5>Cadastrar curso</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="/SistemaGerar/php/cursogravar.php">

            <div class="form-group">
              <label for="nome">Nome do curso</label>
              <h5>' . $row["nome"] . '</h5>
            </div>

            <div class="form-group">
              <label for="descricao">Descrição do curso</label>
              <h5>' . $row["descricao"] . '</h5><br>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="cargahoraria">Carga horária</label>
                <h5>' . $row["cargahoraria"] . 'h</h5>
              </div>
              <div class="form-group col-md-4">
                <label for="validade">Validade</label>
                <h5>' . $row["validade"] . ' (ano)</h5>
              </div>
            </div>
            <div class="modal-footer">
            <a class="btn btn-secondary" href="curso_consultar.php" role="button">Voltar</a>
            <a class="btn btn-danger" href="#" onclick="excluirCurso(' . $row["id"] . ')"  role="button">Apagar</a>
            <a class="btn btn-primary" href="curso_editar.php?id=' . $row["id"] . '" role="button">Editar</a>
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
    echo ('<script>notify("Informações do curso <strong>atualizadas</strong> ", "success", 3000);</script>');
  }
  ?>

  ?>

</body>

</html>