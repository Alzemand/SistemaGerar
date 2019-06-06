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
  ?>

  <div style="margin-top: 130px;">
  </div>

  <div class="col">
    <div class="row">
      <div class="col-md-2 col-lg-2">
      </div>
      <div class="col-md-8 col-lg-8">
        <div class="box">
          <form method="POST" action="php/alunoconsulta.php">
            <div class="row">
              <div class="col-sm-10 col-md-10 col-lg-10">
                <input type="text" class="form-control" placeholder="Digite aqui">
              </div>
              <div class="col-sm-2 col-lg-2 col-md-2">
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
            include('php/alunoconsulta.php');
            ?>
          </tbody>
          </table>
          <div class="text-center">
          <a class="btn btn-link" href="#" role="button">1</a>
          <a class="btn btn-link" href="#" role="button">2</a>
          <a class="btn btn-link" href="#" role="button">3</a>
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
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>


</body>

</html>