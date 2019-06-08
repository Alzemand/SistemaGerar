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
                <i class="fa fa-pencil-square-o"></i>
                <br>
                <h5>Editar aluno</h5>
              </div><br>
              <!-- Formulário -->
              <form method="POST" action="php\alunoeditar.php">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" value=" ' . mask($row["cpf"], '###.###.###-##') . '" placeholder="123.456.789-09" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="rg">RG</label>
                    <input type="text" name="rg" class="form-control" id="rg" value="'. $row["rg"] . '">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" name="nome" class="form-control" id="nome" value="'. $row["nome"] . '" placeholder="Nome completo">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" value="'. $row["email"] . '" placeholder="email@servidor.com">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" value="'. $row["telefone"] . '" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" name="endereco" class="form-control" id="endereco" value="'. $row["endereco"] . '" placeholder="Rua dos Bobos, nº 0 - Av. Projetada">
                </div>

                <div class="form-group">
                  <label for="profissao">Profissão</label>
                  <input type="text" name="profissao" class="form-control" id="profissao" value="'. $row["profissao"] . '" placeholder="">
                </div>

                <div class="form-group">
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="window.history.back()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Atualizar informações</button>
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


</body>

</html>