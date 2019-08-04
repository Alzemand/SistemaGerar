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
  include('../../validador/mask.php');

  $cpf = addslashes($_GET['cpf']);

  $sql = "SELECT * FROM aluno WHERE cpf='$cpf'";
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
                <i class="fa fa-user"></i>
                <br>
                <h5>Informações do aluno</h5>
              </div><br>
              <!-- Formulário -->
              <form method="POST" action="SistemaGerar\php\alunogravar.php">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="cpf">CPF</label>
                      <h5>' . mask($row["cpf"], '###.###.###-##') . '</h5>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="rg">RG</label>
                    <h5>' . $row["rg"] . '</h5>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <h5>' . $row["nome"] . '</h5>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <h5>' . $row["email"] . '</h5>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label>
                    <h5>' . $row["telefone"] . '</h5>
                  </div>
                </div>

                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <h5>' . $row["endereco"] . '</h5>
                </div>

                <div class="form-group">
                  <label for="profissao">Profissão</label>
                  <h5>' . $row["profissao"] . '</h5>
                </div>

                <div class="form-group">
                </div>
                <div class="modal-footer">
                  <a class="btn btn-secondary" href="aluno_consultar.php" role="button">Voltar</a>
                  <a class="btn btn-danger" href="#" onclick="excluirAluno(' . $row["cpf"] . ')"  role="button">Apagar</a>
                  <a class="btn btn-primary" href="aluno_editar.php?cpf=' . $row["cpf"] . '" role="button">Editar</a>
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