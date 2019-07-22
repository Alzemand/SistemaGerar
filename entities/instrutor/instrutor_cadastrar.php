<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
?>

<body>

  <?php
  session_start();

  include('../../header.php');

  $cpf = addslashes($_GET['cpf']);
  $nome = addslashes($_GET['nome']);
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
            <i class="fa fa-street-view"></i>
            <br>
            <h5>Cadastrar Instrutor</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="/SistemaGerar/php/instrutorgravar.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="cpf">CPF</label>

                <?php
                if ($cpf == 'erro') {
                  echo ('
                  <input type="text" name="cpf" class="cpf form-control is-invalid" id="cpf" value="' . $_SESSION['cpf'] . '" placeholder="123.456.789-09">
                  <div class="invalid-feedback">
                    Informe um CPF válido.
                  </div>');
                } elseif ($cpf == 'duplicado') {
                  echo ('
                  <input type="text" name="cpf" class="cpf form-control is-invalid" id="cpf" value="' . $_SESSION['cpf'] . '" placeholder="123.456.789-09">
                  <div class="invalid-feedback">
                    CPF já cadastrado.
                  </div>');
                } else {
                  echo ('<input type="text" name="cpf" class="cpf form-control" id="cpf" value="' . $_SESSION['cpf'] . '" placeholder="123.456.789-09">');
                }
                ?>

              </div>
              <div class="form-group col-md-6">
                <label for="crea">CREA</label>
                <input type="text" name="crea" class="form-control" id="crea" value="<?php echo ($_SESSION['crea']); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="nome">Nome</label>

              <?php
              if ($nome == 'erro') {
                echo ('        
                  <input type="text" name="nome" class="form-control is-invalid" id="nome" value="' . $_SESSION['nome'] . '" placeholder="Nome completo">
                  <div class="invalid-feedback">
                    Campo vazio.
                  </div>');
              } else {
                echo ('<input type="text" name="nome" class="form-control" id="nome" value="' . $_SESSION['nome'] . '"placeholder="Nome completo">');
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

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="valor">Valor hora aula</label>
                <input type="valor" name="valor" class="dinheiro form-control" id="valor" value="<?php echo $_SESSION['valor'] ?>" placeholder="R$ 0,00">
              </div>
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

  unset($_SESSION['cpf']);
  unset($_SESSION['crea']);
  unset($_SESSION['nome']);
  unset($_SESSION['email']);
  unset($_SESSION['telefone']);
  unset($_SESSION['endereco']);
  unset($_SESSION['valor']);

  include('../../scripts.php');
  include('../../footer.php');

  if ($cpf == 'cadastrado') {
    echo ('<script>notify("Novo instrutor cadastrado: <strong>' . $nome . '</strong>.", "success", 5000);</script>');
  }
  ?>

</body>

</html>