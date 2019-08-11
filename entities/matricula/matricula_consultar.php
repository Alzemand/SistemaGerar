<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
// Validador
include('../../validador/mask.php');
// Conexão com o banco
include('../../php/conexao.php');
?>

<body>

  <?php
  include('../../header.php');

  //Paginação da página
  $paginaAtual = isset($_GET['cpg']) ? $_GET['cpg'] : 1;
  $resultadosPorPagina = 30;
  $proximaPagina = ($paginaAtual * $resultadosPorPagina) - $resultadosPorPagina;

  $cont = 1;
  $termo = $_POST['pesquisa'];

  $sql = "SELECT m.id, a.nome as aluno_nome,
  m.turma as turma,
  c.nome as curso,
  e.razao as razao,
  IF(m.pagamento='1','Pago','Pendente') as pagamento
  FROM matricula m
  INNER JOIN empresa e on empresa = e.cnpj
  INNER JOIN aluno a on aluno = a.cpf
  INNER JOIN turma t on turma = t.codturma
  INNER JOIN curso c on t.curso = c.id
  WHERE a.nome LIKE '%$termo%'
  OR m.turma LIKE '%$termo%'
  OR e.razao LIKE '%$termo%'
  OR c.nome LIKE '%$termo%'";

  $sqlcount = "SELECT * FROM matricula";

  $result = $conn->query($sql);

  $contador = $conn->query($sqlcount);

  if ($termo == '') {
    $total = $contador->num_rows;
  } else {
    $total = 1;
  }
  ?>

  <div style="margin-top: 130px;">
  </div>

  <div class="col">
    <div class="row">
      <div class="col-md-2 col-lg-2">
      </div>
      <div class="col-md-8 col-lg-8">
        <div class="box">
          <form method="POST" action="matricula_consultar.php">
            <div class="row">
              <div class="col-sm-10 col-md-10 col-lg-10">
                <input type="text" name="pesquisa" class="form-control" placeholder="Digite aqui para pesquisar alunos">
              </div>
              <div class="col-sm-2 col-lg-2 col-md-2" align="center">
                <button type="submit" class="btn btn-primary left">Pesquisar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-2 col-lg-2">
      </div>
    </div>
  </div>

  <div class="col-md-12 col-lg-12">
    <div class="box">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOME</th>
              <th scope="col">TURMA</th>
              <th scope="col">CURSO</th>
              <th scope="col">EMPRESA</th>
              <th scope="col">PAGAMENTO</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                echo ('
                  <tr>
                      <th scope="row">' . $cont . '</th>
                      <td>' . $row["aluno_nome"] . '</td>
                      <td>' . $row["turma"] . '</td>
                      <td>' . $row["curso"] . '</td>
                      <td>' . $row["razao"] . '</td>
                      <td>' . $row["pagamento"] . '</td>
          
                      <td>
                      <a class="btn btn-primary" href="matricula_visualizar.php?id=' . $row["id"] . '" role="button" ><i class="fa fa-search" title="Visualizar informações completas" aria-hidden="true"></i>
                      </a>
                      <a class="btn btn-danger" href="#" onclick="excluirMatricula(' . $row["id"] . ')" role="button"><i class="fa fa-trash" title="Apagar" aria-hidden="true"></i></a>
                      ');

                      if ($row["pagamento"] == "Pendente"){
                        echo ('<a class="btn btn-success" href="#" onclick="pagarMatricula(' . $row["id"] . ')" role="button"><i class="fa fa-usd" title="Alterar pagamento" aria-hidden="true"></i></a>');
                      }

                      echo('

                      </td>
                  </tr>');
                $cont = $cont + 1;
              }
            } else {
              echo ('<h3>Sem resultados</h3>');
            }

            ?>
          </tbody>
        </table>
        <div class="text-center" align="center">
          <nav aria-label="Navegação de página exemplo">
            <ul class="pagination justify-content-center">

              <?php

              $quantidadeDeLinks = ceil($total / $resultadosPorPagina);

              for ($i = $paginaAtual - 3, $limiteDeLinks = $i + 6; $i <= $limiteDeLinks; $i++) {
                if ($i < 1) {
                  $i = 1;
                  $limiteDeLinks = 7;
                }
                if ($limiteDeLinks > $quantidadeDeLinks) {
                  $limiteDeLinks = $quantidadeDeLinks;
                  $i = $limiteDeLinks - 6;
                }
                if ($i < 1) {
                  $i = 1;
                  $limiteDeLinks = $quantidadeDeLinks;
                }

                if ($i == $paginaAtual)
                  echo ('<li class="page-item active"><a class="page-link">' . $i . '</a></li>');
                else
                  echo '<li class="page-item"><a class="page-link" href="?cpg=' . $i . '">' . $i . ' </a></li>';
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>

      <?php
      include('../../scripts.php');
      $id = $_GET['id'];
      if ($id == 'apagado') {
        echo ('<script>notify("Matrícula<strong> cancelada</strong> com sucesso", "danger", 3000);</script>');
      }
      elseif($id == 'pago'){
        echo ('<script>notify("Alterado para<strong> PAGO</strong> com sucesso", "success", 3000);</script>');
      }
      $conn->close();
      ?>

</body>

</html>