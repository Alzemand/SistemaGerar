<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
?>

<body>

  <?php
  include('../../header.php');
  $curso = $_GET['curso'];
  $nome = $_GET['nome'];
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
            <i class="fa fa-book"></i>
            <br>
            <h5>Cadastrar curso</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="/SistemaGerar/php/cursogravar.php">

            <div class="form-group">
              <label for="nome">Nome do curso</label>
              <input type="text" name="nome" class="form-control" id="nome" required placeholder="NR33" oninvalid="this.setCustomValidity('Campo não pode ficar em branco')"
 oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
              <label for="descricao">Descrição do curso</label>
              <textarea name="descricao" class="form-control" id="descricao" rows="3" required placeholder="Treinamento de Trabalhadores Autorizados e Vigias em Espaços Confinados"></textarea>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="cargahoraria">Carga horária</label>
                <input type="number" name="cargahoraria" class="form-control" id="cargahoraria" required placeholder="20h" oninvalid="this.setCustomValidity('Quantidade de horas')"
 oninput="setCustomValidity('')">
              </div>
              <div class="form-group col-md-4">
                <label for="validade">Validade</label>
                <input type="number" name="validade" class="form-control" id="validade" required placeholder="1 ano" oninvalid="this.setCustomValidity('Se não houver validade, infome 0 (zero)')"
 oninput="setCustomValidity('')">
              </div>
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
  include('../../scripts.php');
  include('../../footer.php');

  if ($curso == 'cadastrado') {
    echo ('<script>notify("Novo curso cadastrado: <strong>' . $nome . '</strong>.", "success", 5000);</script>');
  }
  ?>

</body>

</html>