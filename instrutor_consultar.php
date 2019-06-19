<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Sistema Gerar</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="projeto gerar, projetogerar, nr33, treinamentos, macaé" name="keywords">
  <meta content="Projeto Gerar social - Treinamentos" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com e Edilson Alzemands
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>


  <?php
  include('header.php');

  //Paginação da página
  $paginaAtual = isset($_GET['cpg']) ? $_GET['cpg'] : 1;
  $resultadosPorPagina = 30;
  $proximaPagina = ($paginaAtual * $resultadosPorPagina) - $resultadosPorPagina;


  include('php/instrutorconsulta.php');
  ?>

  <div style="margin-top: 130px;">
  </div>

  <div class="col">
    <div class="row">
      <div class="col-md-2 col-lg-2">
      </div>
      <div class="col-md-8 col-lg-8">
        <div class="box">
          <form method="POST" action="instrutor_consultar.php">
            <div class="row">
              <div class="col-sm-10 col-md-10 col-lg-10">
                <input type="text" name="pesquisa" class="form-control" placeholder="Digite aqui para pesquisar um instrutor">
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
              <th scope="col">CREA</th>
              <th scope="col">E-mail</th>
              <th scope="col">Telefone</th>
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
                      <td>' . $row["crea"] . '</td>
                      <td>' . $row["email"] . '</td>
                      <td>' . $row["telefone"] . '</td>
          
                      <td>
                      <a class="btn btn-primary" href="instrutor_visualizar.php?cpf=' . $row["cpf"] . '" role="button" ><i class="fa fa-search" title="Visualizar informações completas" aria-hidden="true"></i>
                      </a>
                      <a class="btn btn-primary" href="instrutor_editar.php?cpf=' . $row["cpf"] . '" role="button"><i class="fa fa-pencil" title="Editar dados" aria-hidden="true"></i></a>
                      <a class="btn btn-danger" href="#" onclick="confirmar(' . $row["cpf"] . ')" role="button"><i class="fa fa-trash" title="Apagar" aria-hidden="true"></i></a>
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

      <!-- JavaScript Libraries -->
      <script src="lib/jquery/jquery.min.js"></script>
      <script src="lib/jquery/jquery-migrate.min.js"></script>
      <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/mobile-nav/mobile-nav.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/counterup/counterup.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="lib/isotope/isotope.pkgd.min.js"></script>
      <script src="lib/lightbox/js/lightbox.min.js"></script>

      <!-- Template Main Javascript File -->
      <script src="js/main.js"></script>


      <?php
      $cpf = $_GET['cpf'];
      if ($cpf == 'apagado') {
        echo ('<script>notify("Aluno<strong> excluído</strong> com sucesso", "danger", 5000);</script>');
      }
      ?>

</body>

</html>