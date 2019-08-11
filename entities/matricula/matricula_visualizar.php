<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
?>

<body>

  <div style="margin-top: 130px;">
  </div>

  <?php

  include('../../header.php');
  include('../../php/conexao.php');

  $id = addslashes($_GET['id']);

  $sql = "SELECT m.id, a.nome as aluno_nome,
  m.turma as turma,
  c.nome as curso,
  e.razao as razao,
  IF(m.pagamento='1','Pago','Pendente') as pagamento
  FROM matricula m
  INNER JOIN empresa e on empresa = e.cnpj
  INNER JOIN aluno a on aluno = a.cpf
  INNER JOIN turma t on turma = t.codturma
  INNER JOIN curso c on t.curso = c.id
  WHERE m.id = $id";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo ('
      <div class="container">
      <div class="row">
        <div class="col-md-2 col-lg-2">
        </div>
        <div class="col-md-8 col-lg-8">
          <div class="box">
            <div class="text-center icone">
              <i class="fa fa-graduation-cap"></i>
              <br>
              <h5>Detalhes da matrícula</h5>
            </div><br>
            <!-- Formulário -->
            <form method="POST" action="/SistemaGerar/php/matriculagravar.php">
              <div class="form-group">
                <label for="nome">Aluno</label>
                <h5>' . $row["aluno_nome"] . '</h5>
              </div>
              <div class="form-group">
                <label for="turma">Turma</label>
                <h5>' . $row["turma"] . '</h5>
              </div>
              <div class="form-group">
              <label for="curso">Curso</label>
              <h5>' . $row["curso"] . '</h5>
            </div>
              <div class="form-group">
                <label for="empresa">Empresa</label>
                <h5>' . $row["razao"] . '</h5>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="pagamento">Situação</label>');

                  if ($row["pagamento"] == "Pago"){
                    echo('<h5 class="text-success">' . $row["pagamento"] . '</h5>');
                  }
                  else{
                    echo ('<h5 class="text-danger">' . $row["pagamento"] . '</h5>');
                  }

                  echo('
                  
                </div>
              </div>

              <div class="form-group">
              </div>
              <div class="modal-footer">
              <a class="btn btn-secondary" href="matricula_consultar.php" role="button">Voltar</a>
              <a class="btn btn-danger" href="#" onclick="excluirMatricula(' . $row["id"] . ')"  role="button">Apagar</a>
              <a class="btn btn-primary" href="matricula_editar.php?id=' . $row["id"] . '" role="button">Editar</a>
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
    echo ('<script>notify("Informações do aluno <strong>atualizadas</strong> ", "success", 5000);</script>');
  }
  ?>

</body>

</html>