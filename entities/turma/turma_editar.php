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
  $codturma = addslashes($_GET['codturma']);

  $sql = "SELECT t.codturma, t.valor, c.nome as curso,
  i.nome as instrutor, datainicio, datafim
  FROM turma t
  INNER JOIN instrutor i on t.instrutor = i.cpf 
  INNER JOIN curso c ON c.id = t.curso
  WHERE codturma = '$codturma'";

  $sqlcurso = "SELECT id, nome FROM curso";

  $sqlinstrutor = "SELECT cpf, nome FROM instrutor";

  $result = $conn->query($sql);

  $resultcurso = $conn->query($sqlcurso);

  $resultinstrutor = $conn->query($sqlinstrutor);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row1 = $result->fetch_assoc()) {

      echo ('
      
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-lg-2">
          </div>
          <div class="col-md-8 col-lg-8">
            <div class="box">
              <div class="text-center icone">
                <i class="fa fa-users"></i>
                <br> 
                <h5>Editar turma</h5>
              </div><br>
              <!-- Formulário -->
              <form method="POST" action="/SistemaGerar/php/turmaeditar.php">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="curso">Curso</label>
                    
                    <select name="curso" class="form-control" id="curso" required>
                      <option value="">Selecione um curso...</option>');
                      
                      if ($resultcurso->num_rows > 0) {
                        while ($row2 = $resultcurso->fetch_assoc()) {
                          echo ('<option value=' . $row2["id"] . '>' . $row2["nome"] . '</option>');
                        }
                      };

                    echo('
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="instrutor">Instrutor</label>
                    <select name="instrutor" class="form-control" id="instrutor" required>
                      <option value="">Selecione um instrutor...</option>');

                      if ($resultinstrutor->num_rows > 0) {
                        while ($row3 = $resultinstrutor->fetch_assoc()) {
                          echo ('<option value=' . $row3["cpf"] . '>' . $row3["nome"] . '</option>');
                        }
                      };

                    echo('
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="codturma">Código da turma</label>
                    <input type="text" name="codturma" class="form-control" id="codturma" autocomplete="off" value="'. $row1["codturma"] .'" readonly placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" class="dinheiro form-control" id="valor" autocomplete="off" value="'. $row1["valor"] .'" required placeholder="">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="datainicio">Data início</label>
                    <input type="date" name="datainicio" class="form-control" id="datainicio" value="'. $row1["datainicio"] .'" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="datafim">Data fim</label>
                    <input type="date" name="datafim" class="form-control" id="datafim" value="'. $row1["datafim"] .'" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
                  <button type="submit" class="btn btn-primary">Salvar informações</button>
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
  ?>


</body>

</html>