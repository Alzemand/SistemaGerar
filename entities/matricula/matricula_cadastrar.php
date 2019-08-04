<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
?>

<body>

  <?php
  include('../../header.php');

  include('../../php/conexao.php');
  $sqlaluno = "SELECT * from aluno";
  $sqlempresa = "SELECT * from empresa";
  $sqlturma = "SELECT t.codturma, c.nome as curso FROM turma t INNER JOIN curso c on c.id = t.curso";
  $resultaluno = $conn->query($sqlaluno);
  $resultempresa = $conn->query($sqlempresa);
  $resultturma = $conn->query($sqlturma);

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
            <i class="fa fa-graduation-cap"></i>
            <br>
            <h5>Matricular aluno</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="/SistemaGerar/php/matriculagravar.php">

            <div class="form-group">
              <label for="nome">Aluno</label>
              <input type="text" class="custom-select" autocomplete="off" list="aluno_list" id="aluno" name="aluno" placeholder="Digite o nome de um aluno..." required>
              <datalist id="aluno_list">
                <select>
                  <?php
                  if ($resultaluno->num_rows > 0) {
                    while ($row = $resultaluno->fetch_assoc()) {
                      echo ('<option data-value="' . $row["cpf"] . '" value="' . $row["nome"] . '">' . $row["nome"] . '</option>');
                    }
                  }
                  ?>
                </select>
              </datalist>
            </div>

            <div class="form-group">
              <label for="turma">Turma</label>
              <select name="turma" class="form-control" required>
                <option value="">Selecione a turma...</option>

                <?php
                if ($resultturma->num_rows > 0) {
                  while ($row2 = $resultturma->fetch_assoc()) {
                    echo ('<option value="' . $row2["codturma"] . '">' . $row2["codturma"] . " - " . $row2["curso"] . '</option>');
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="empresa">Empresa</label>
              <select name="empresa" class="form-control" required>
                <option value="">Selecione a empresa...</option>

                <?php
                if ($resultempresa->num_rows > 0) {
                  while ($row1 = $resultempresa->fetch_assoc()) {
                    echo ('<option value="' . $row1["cnpj"] . '">' . $row1["razao"] . '</option>');
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="desconto">Desconto (valor se aplicável)</label>
                <input name="desconto" type="text" class="dinheiro form-control" id="" placeholder="0,00">
              </div>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="pagamento" id="inlineRadio1" value="1" checked>
              <label class="form-check-label" for="inlineRadio1">Pagamento efetuado</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="pagamento" id="inlineRadio2" value="0">
              <label class="form-check-label" for="inlineRadio2">Pagamento pendente</label>
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

  if ($cpf == 'cadastrado') {
    echo ('<script>notify("Novo aluno cadastrado: <strong>' . $nome . '</strong>.", "success", 5000);</script>');
  }
  ?>

  <!-- Humilde gambiarra para não ter que usar um monte de jquery (eu nem sei usar jquery na verdade)-->
  <script>
    let input = document.getElementById('aluno')

    input.addEventListener('input', function(evt) {
      let selector = document.querySelector('option[value="' + this.value + '"]')
      if (selector) {
        this.form.addEventListener('submit', function(evt) {
          input.value = selector.getAttribute('data-value')
        }, false)
      }
    }, false)
  </script>

</body>

</html>