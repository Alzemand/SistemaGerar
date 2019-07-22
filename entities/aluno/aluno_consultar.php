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

  $sql = "SELECT * FROM aluno 
  WHERE nome LIKE '%$termo%' 
  or cpf LIKE '%$termo%'
  or email LIKE '%$termo%'
  or telefone LIKE '%$termo%'
  or profissao LIKE '%$termo%'
  ORDER BY nome
  LIMIT $proximaPagina, $resultadosPorPagina";

  $sqlcount = "SELECT * FROM aluno";

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
          <form method="POST" action="aluno_consultar.php">
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
              <th scope="col">CPF</th>
              <th scope="col">E-mail</th>
              <th scope="col">Telefone</th>
              <th scope="col">Profissão</th>
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
                      <td>' . $row["nome"] . '</td>
                      <td>' . mask($row["cpf"], '###.###.###-##') . '</td>
                      <td>' . $row["email"] . '</td>
                      <td>' . $row["telefone"] . '</td>
                      <td>' . $row["profissao"] . '</td>
          
                      <td>
                      <a class="btn btn-primary" href="aluno_visualizar.php?cpf=' . $row["cpf"] . '" role="button" ><i class="fa fa-search" title="Visualizar informações completas" aria-hidden="true"></i>
                      </a>
                      <a class="btn btn-primary" href="aluno_editar.php?cpf=' . $row["cpf"] . '" role="button"><i class="fa fa-pencil" title="Editar dados" aria-hidden="true"></i></a>
                      <a class="btn btn-danger" href="#" onclick="excluirAluno(' . $row["cpf"] . ')" role="button"><i class="fa fa-trash" title="Apagar" aria-hidden="true"></i></a>
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
      $cpf = $_GET['cpf'];
      if ($cpf == 'apagado') {
        echo ('<script>notify("Aluno<strong> excluído</strong> com sucesso", "danger", 5000);</script>');
      }
      $conn->close();
      ?>

</body>

</html>