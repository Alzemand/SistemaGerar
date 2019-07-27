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
            <i class="fa fa-user-plus"></i>
            <br>
            <h5>Cadastrar aluno</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="/SistemaGerar/php/alunogravar.php">
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
                <label for="rg">RG</label>
                <input type="text" name="rg" class="rg form-control" id="rg" value="<?php echo ($_SESSION['rg']); ?>">
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

            <div class="form-group">
              <label for="profissao">Profissão</label>
              <input type="text" name="profissao" class="form-control" id="profissao" value="<?php echo $_SESSION['profissao'] ?>" placeholder="">
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

  if ($cpf == 'cadastrado') {
    echo ('<script>notify("Novo aluno cadastrado: <strong>' . $nome . '</strong>.", "success", 5000);</script>');
  }
  ?>
  <script>
    $(function() {
      $('#profissao').autoComplete({
        minChars: 1,
        source: function(term, suggest) {
          term = term.toLowerCase();
          var choices = ['ActionScript', 'AppleScript', 'Asp', 'Assembly', 'BASIC', 'Batch', 'C', 'C++', 'CSS', 'Clojure', 'COBOL', 'ColdFusion', 'Erlang', 'Fortran', 'Groovy', 'Haskell', 'HTML', 'Java', 'JavaScript', 'Lisp', 'Perl', 'PHP', 'PowerShell', 'Python', 'Ruby', 'Scala', 'Scheme', 'SQL', 'TeX', 'XML'];
          var suggestions = [];
          for (i = 0; i < choices.length; i++)
            if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
          suggest(suggestions);
        }
      });
    });
  </script>

</body>

</html>