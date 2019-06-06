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

  <div style="margin-top: 130px;">
  </div>

  <?php

  include('header.php');
  include('validador/mask.php');
  include('php/conexao.php');
  $cpf = $_GET['cpf'];

  $sql = "SELECT * FROM aluno WHERE cpf='$cpf'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      echo ('
      
      
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-lg-2">
      </div>
      <div class="col-md-8 col-lg-8">
        <div class="box">
          <div class="text-center icone">
            <i class="fa fa-user"></i>
            <br>
            <h5>Informações do aluno</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="php\alunogravar.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="cpf">CPF</label>
                  <h5>'. mask($row["cpf"], '###.###.###-##') .'</h5>
              </div>
              <div class="form-group col-md-6">
                <label for="rg">RG</label>
                <h5>'. $row["rg"] . '</h5>
              </div>
            </div>
            <div class="form-group">
              <label for="nome">Nome</label>
              <h5>'. $row["nome"] . '</h5>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <h5>'. $row["email"] . '</h5>
              </div>
              <div class="form-group col-md-6">
                <label for="telefone">Telefone</label>
                <h5>'. $row["telefone"] . '</h5>
              </div>
            </div>

            <div class="form-group">
              <label for="endereco">Endereço</label>
              <h5>'. $row["endereco"] . '</h5>
            </div>

            <div class="form-group">
              <label for="profissao">Profissão</label>
              <h5>'. $row["profissao"] . '</h5>
            </div>
            
            <div class="form-group">
            </div>
            <div class="modal-footer">
              <a class="btn btn-secondary" href="http://localhost/SistemaGerar/aluno_consultar.php?'. $row["cpf"] .'" role="button">Voltar</a>
              <button type="submit" class="btn btn-danger">Apagar</button>
              <button type="submit" class="btn btn-primary">Editar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-2 col-lg-2">
      </div>
    </div>
  </div>');

    }
  } else {
    echo "<center><h5>Algo deu errado e o sistema não consegue exibir esses dados...</h5><center>";
  }


  ?>





  <br><br><br><br>

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