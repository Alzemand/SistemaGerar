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
  include('php/conexao.php');
  $id = addslashes($_GET['id']);

  $sql = "SELECT * FROM curso WHERE id='$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo ('
      

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
          <form method="POST" action="php\cursogravar.php">

            <div class="form-group">
              <label for="nome">Nome do curso</label>
              <h5>' . $row["nome"] . '</h5>
            </div>

            <div class="form-group">
              <label for="descricao">Descrição do curso</label>
              <h5>' . $row["descricao"] . '</h5><br>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="cargahoraria">Carga horária</label>
                <h5>' . $row["cargahoraria"] . 'h</h5>
              </div>
              <div class="form-group col-md-4">
                <label for="validade">Validade</label>
                <h5>' . $row["validade"] . ' (ano)</h5>
              </div>
            </div>
            <div class="modal-footer">
            <a class="btn btn-secondary" href="curso_consultar.php" role="button">Voltar</a>
            <a class="btn btn-danger" href="#" onclick="cursoExcluir(' . $row["id"] . ')"  role="button">Apagar</a>
            <a class="btn btn-primary" href="curso_editar.php?id=' . $row["id"] . '" role="button">Editar</a>
          </div>
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

  $conn->close();
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
  <?php
  if ($curso == 'cadastrado') {
    echo ('<script>notify("Novo curso cadastrado: <strong>' . $nome . '</strong>.", "success", 5000);</script>');
  }
  ?>

</body>

</html>