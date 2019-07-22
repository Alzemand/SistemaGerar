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
  include('../../validador/mask.php');
  include('../../php/conexao.php');
  $cpf = addslashes($_GET['cpf']);

  $sql = "SELECT * FROM instrutor WHERE cpf='$cpf'";
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
                <i class="fa fa-pencil-square-o"></i>
                <br>
                <h5>Editar instrutor</h5>
              </div><br>
              <!-- Formulário -->
              <form method="POST" action="/SistemaGerar/php/instrutoreditar.php">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" value=" ' . mask($row["cpf"], '###.###.###-##') . '" placeholder="123.456.789-09" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="crea">CREA</label>
                    <input type="text" name="crea" class="form-control" id="crea" value="' . $row["crea"] . '">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" name="nome" class="form-control" id="nome" value="' . $row["nome"] . '" placeholder="Nome completo">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" value="' . $row["email"] . '" placeholder="email@servidor.com">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" value="' . $row["telefone"] . '" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" name="endereco" class="form-control" id="endereco" value="' . $row["endereco"] . '" placeholder="Rua dos Bobos, nº 0 - Av. Projetada">
                </div>

                <div class="form-group">
                  <label for="valor">Valor hora/aula</label>
                  <input type="text" name="valor" class="dinheiro form-control" id="valor" value="' . $row["valor"] . '" placeholder="">
                </div>

                <div class="form-group">
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="window.history.back()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Atualizar informações</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-2 col-lg-2">
          </div>
        </div>
      </div><br><br><br><br>'
    );
  
    }
  } else {
    echo "<center><h5>Algo deu errado e o sistema não consegue exibir esses dados...</h5><center>";
  }
  
  $conn->close();
  include('../../scripts.php');
  include('../../footer.php');
  ?>
  
</body>

</html>