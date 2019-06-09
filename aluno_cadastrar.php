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
  session_start();

  include('header.php');

  $cpf = $_GET['cpf'];
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
            <i class="fa fa-user-plus"></i>
            <br>
            <h5>Cadastrar aluno</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="php\alunogravar.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="cpf">CPF</label>

                <?php
                if ($cpf == 'erro') {
                  echo ('
                  <input type="text" name="cpf" class="form-control is-invalid" id="cpf" value="' . $_SESSION['cpf'] . '" placeholder="123.456.789-09">
                  <div class="invalid-feedback">
                    Informe um CPF válido.
                  </div>');
                } elseif ($cpf == 'duplicado') {
                  echo ('
                  <input type="text" name="cpf" class="form-control is-invalid" id="cpf" value="' . $_SESSION['cpf'] . '" placeholder="123.456.789-09">
                  <div class="invalid-feedback">
                    CPF já cadastrado.
                  </div>');
                } else {
                  echo ('<input type="text" name="cpf" class="form-control" id="cpf" value="' . $_SESSION['cpf'] . '" placeholder="123.456.789-09">');
                }
                ?>

              </div>
              <div class="form-group col-md-6">
                <label for="rg">RG</label>
                <input type="text" name="rg" class="form-control" id="rg" value="<?php echo ($_SESSION['rg']); ?>">
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
                <input type="text" name="telefone" class="form-control" id="telefone" value="<?php echo $_SESSION['telefone'] ?>" placeholder="">
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
  include('footer.php');

  unset($_SESSION['cpf']);
  unset($_SESSION['rg']);
  unset($_SESSION['nome']);
  unset($_SESSION['email']);
  unset($_SESSION['telefone']);
  unset($_SESSION['profissao']);

  ?>

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
if ($cpf == 'cadastrado') {
  echo ('<script>notify("Novo aluno cadastrado: <strong>' . $nome . '</strong>.", "success", 5000);</script>');
}
?>

</body>

</html>