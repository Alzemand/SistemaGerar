<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php')
?>

<body>

  <div style="margin-top: 130px;">
  </div>

  <?php

  include('../../header.php');
  include('../../validador/mask.php');
  include('../../php/conexao.php');
  $cnpj = addslashes($_GET['cnpj']) ;

  $sql = "SELECT * FROM empresa WHERE cnpj='$cnpj'";
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
                <i class="fa fa-building"></i>
                <br>
                <h5>Informações do empresa</h5>
              </div><br>
              <!-- Formulário -->
              <form method="POST" action="php\empresagravar.php">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="cnpj">CNPJ</label>
                      <h5>' . mask($row["cnpj"], '##.###.###/####-##') . '</h5>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inscricao">Inscrição Estadual</label>
                    <h5>' . $row["inscricao"] . '</h5>
                  </div>
                </div>
                <div class="form-group">
                  <label for="razao">razao</label>
                  <h5>' . $row["razao"] . '</h5>
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
                  <label for="responsavel">Responsável</label>
                  <h5>' . $row["responsavel"] . '</h5>
                </div>

                <div class="form-group">
                </div>
                <div class="modal-footer">
                  <a class="btn btn-secondary" href="empresa_consultar.php" role="button">Voltar</a>
                  <a class="btn btn-danger" href="#" onclick="excluirEmpresa('. $row["cnpj"] .')"  role="button">Apagar</a>
                  <a class="btn btn-primary" href="empresa_editar.php?cnpj=' . $row["cnpj"] . '" role="button">Editar</a>
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
    echo ('<script>notify("Informações do empresa <strong>atualizadas</strong> ", "success", 5000);</script>');
  }
  ?>

</body>

</html>