<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
?>

<body>

  <?php
  session_start();

  include('../../header.php');

  $cnpj = addslashes($_GET['cnpj']);
  $razao = addslashes($_GET['razao']);
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
            <i class="fa fa-building"></i>
            <br>
            <h5>Cadastrar empresa</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="/SistemaGerar/php/empresagravar.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="cnpj">CNPJ</label>

                <?php
                if ($cnpj == 'erro') {
                  echo ('
                  <input type="text" name="cnpj" class="cnpj form-control is-invalid" id="cnpj" value="' . $_SESSION['cnpj'] . '" placeholder="12.345.678/0001-99">
                  <div class="invalid-feedback">
                    Informe um CNPJ válido.
                  </div>');
                } elseif ($cnpj == 'duplicado') {
                  echo ('
                  <input type="text" name="cnpj" class="cnpj form-control is-invalid" id="cnpj" value="' . $_SESSION['cnpj'] . '" placeholder="12.345.678/0001-99">
                  <div class="invalid-feedback">
                    CNPJ já cadastrado.
                  </div>');
                } else {
                  echo ('<input type="text" name="cnpj" class="cnpj form-control" id="cnpj" value="' . $_SESSION['cnpj'] . '" placeholder="12.345.678/0001-99">');
                }
                ?>

              </div>
              <div class="form-group col-md-6">
                <label for="inscricao">Incrição Estadual</label>
                <input type="text" name="inscricao" class="inscricao form-control" id="inscricao" value="<?php echo ($_SESSION['inscricao']); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="razao">Nome/Razão Social</label>

              <?php
              if ($razao == 'erro') {
                echo ('        
                  <input type="text" name="razao" class="form-control is-invalid" id="razao" value="' . $_SESSION['razao'] . '" placeholder="">
                  <div class="invalid-feedback">
                    Campo vazio.
                  </div>');
              } else {
                echo ('<input type="text" name="razao" class="form-control" id="razao" value="' . $_SESSION['razao'] . '"placeholder="">');
              }
              ?>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['email'] ?>" placeholder="email@servidor.com">
              </div>
              <div class="form-group col-md-6">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" class="telefone form-control" id="telefone" value="<?php echo $_SESSION['telefone'] ?>" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" name="endereco" class="form-control" id="endereco" value="<?php echo $_SESSION['endereco'] ?>" placeholder="Rua dos Bobos, nº 0 - Av. Projetada">
            </div>

            <div class="form-group">
              <label for="responsavel">Nome do responsável</label>
              <input type="text" name="responsavel" class="form-control" id="responsavel" value="<?php echo $_SESSION['profissao'] ?>" placeholder="">
            </div>

            <div class="form-group">
            </div>
            <div class="modal-footer">
              <a class="btn btn-secondary" href="/SistemaGerar/index.php" role="button">Cancelar</a>
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
  include('../../footer.php');
  include('../../scripts.php');

  unset($_SESSION['cnpj']);
  unset($_SESSION['inscricao']);
  unset($_SESSION['razao']);
  unset($_SESSION['email']);
  unset($_SESSION['telefone']);
  unset($_SESSION['endereco']);
  unset($_SESSION['responsavel']);

  if ($cnpj == 'cadastrado') {
    echo ('<script>notify("Nova empresa cadastrada: <strong>' . $razao . '</strong>.", "success", 5000);</script>');
  }
  ?>

</body>

</html>