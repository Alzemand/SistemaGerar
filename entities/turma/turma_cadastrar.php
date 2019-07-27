<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
?>

<body>

  <?php
  session_start();
  include('../../header.php');

  $codturma = addslashes($_GET['codturma']);
  $curso = addslashes($_GET['curso']);
  $instrutor = addslashes($_GET['instrutor']);

  include('../../php/conexao.php');
  $sqlcurso = "SELECT * from curso";
  $sqlinstrutor = "SELECT * from instrutor";
  $resultcurso = $conn->query($sqlcurso);
  $resultinstrutor = $conn->query($sqlinstrutor);
  ?>

  <div style="margin-top: 130px;">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-lg-2">
      </div>
      <div class="col-md-8 col-lg-8">
        <div class="box">
          <div class="text-center icone">
            <i class="fa fa-user-plus"></i>
            <br>
            <h5>Cadastrar turma</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="/SistemaGerar/php/turmagravar.php">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="curso">Curso</label>
                <select name="curso" class="form-control" id="curso">
                  <option value="vazio">Selecione um curso...</option>
                  <?php
                  if ($resultcurso->num_rows > 0) {
                    while ($row = $resultcurso->fetch_assoc()) {
                      echo ('<option value=' . $row["id"] . '>' . $row["nome"] . '</option>');
                    }
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="instrutor">Instrutor</label>
                <select name="instrutor" class="form-control" id="instrutor">
                  <option value="vazio">Selecione um instrutor...</option>
                  <?php
                  if ($resultinstrutor->num_rows > 0) {
                    while ($row = $resultinstrutor->fetch_assoc()) {
                      echo ('<option value=' . $row["cpf"] . '>' . $row["nome"] . '</option>');
                    }
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="codturma">Código da turma</label>
                <?php
                if ($codturma == 'erro') {
                  echo ('
                  <input type="text" name="codturma" class="form-control is-invalid" id="codturma" autocomplete="off" value="' . $_SESSION['codturma'] . '" required placeholder="A123">
                  <div class="invalid-feedback">
                    Informe um CPF válido.
                  </div>');
                } elseif ($codturma == 'duplicado') {
                  echo ('
                  <input type="text" name="codturma" class="form-control is-invalid" id="codturma" autocomplete="off" value="' . $_SESSION['codturma'] . '" required placeholder="A123">
                  <div class="invalid-feedback">
                    CPF já cadastrado.
                  </div>');
                } else {
                  echo ('<input type="text" name="codturma" class="form-control" id="codturma" autocomplete="off" value="' . $_SESSION['codturma'] . '" required placeholder="A123">');
                }
                ?>
              </div>


              <div class="form-group col-md-6">
                <label for="valor">Valor</label>
                <input type="text" name="valor" class="dinheiro form-control" id="valor" autocomplete="off" value="<?php echo $_SESSION['valor'] ?>" required placeholder="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="datainicio">Data início</label>
                <input type="date" name="datainicio" class="form-control" id="datainicio" value="<?php echo $_SESSION['datainicio'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="datafim">Data fim</label>
                <input type="date" name="datafim" class="form-control" id="datafim" value="<?php echo $_SESSION['datafim'] ?>">
              </div>
            </div>


            <div class="form-group">
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
  </div>
  <br><br><br><br>

  <?php
  include('../../scripts.php');
  include('../../footer.php');


  unset($_SESSION['cpf']);
  unset($_SESSION['rg']);
  unset($_SESSION['nome']);
  unset($_SESSION['email']);
  unset($_SESSION['telefone']);
  unset($_SESSION['profissao']);
  unset($_SESSION['endereco']);
  $conn->close();

  if ($cpf == 'cadastrado') {
    echo ('<script>notify("Novo aluno cadastrado: <strong>' . $nome . '</strong>.", "success", 5000);</script>');
  }
  ?>


</body>

</html>