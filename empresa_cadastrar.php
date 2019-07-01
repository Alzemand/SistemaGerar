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

  $cnpj = addslashes($_GET['cnpj']);
  $razao = addslashes($_GET['razao']);
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
            <i class="fa fa-building"></i>
            <br>
            <h5>Cadastrar empresa</h5>
          </div><br>
          <!-- Formulário -->
          <form method="POST" action="php\empresagravar.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="cnpj">CNPJ</label>

                <?php
                if ($cnpj == 'erro') {
                  echo ('
                  <input type="text" name="cnpj" class="cnpj form-control is-invalid" id="cnpj" value="' . $_SESSION['cnpj'] . '" placeholder="12.345.678/0001-99">
                  <div class="invalid-feedback">
                    Informe um CNPJ válido.
                  </div>');
                } elseif ($cnpj == 'duplicado') {
                  echo ('
                  <input type="text" name="cnpj" class="cnpj form-control is-invalid" id="cnpj" value="' . $_SESSION['cnpj'] . '" placeholder="12.345.678/0001-99">
                  <div class="invalid-feedback">
                    CNPJ já cadastrado.
                  </div>');
                } else {
                  echo ('<input type="text" name="cnpj" class="cnpj form-control" id="cnpj" value="' . $_SESSION['cnpj'] . '" placeholder="12.345.678/0001-99">');
                }
                ?>

              </div>
              <div class="form-group col-md-6">
                <label for="inscricao">Incrição Estadual</label>
                <input type="text" name="inscricao" class="inscricao form-control" id="inscricao" value="<?php echo ($_SESSION['inscricao']); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="razao">Nome/Razão Social</label>

              <?php
              if ($razao == 'erro') {
                echo ('        
                  <input type="text" name="razao" class="form-control is-invalid" id="razao" value="' . $_SESSION['razao'] . '" placeholder="">
                  <div class="invalid-feedback">
                    Campo vazio.
                  </div>');
              } else {
                echo ('<input type="text" name="razao" class="form-control" id="razao" value="' . $_SESSION['razao'] . '"placeholder="">');
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
                <input type="text" name="telefone" class="telefone form-control" id="telefone" value="<?php echo $_SESSION['telefone'] ?>" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" name="endereco" class="form-control" id="endereco" value="<?php echo $_SESSION['endereco'] ?>" placeholder="Rua dos Bobos, nº 0 - Av. Projetada">
            </div>

            <div class="form-group">
              <label for="responsavel">Nome do responsável</label>
              <input type="text" name="responsavel" class="form-control" id="responsavel" value="<?php echo $_SESSION['profissao'] ?>" placeholder="">
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

  unset($_SESSION['cnpj']);
  unset($_SESSION['inscricao']);
  unset($_SESSION['razao']);
  unset($_SESSION['email']);
  unset($_SESSION['telefone']);
  unset($_SESSION['endereco']);
  unset($_SESSION['responsavel']);

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
  
  <!-- Template Main Javascript File -->
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/main.js"></script>


<?php
if ($cnpj == 'cadastrado') {
  echo ('<script>notify("Nova empresa cadastrada: <strong>' . $razao . '</strong>.", "success", 5000);</script>');
}
?>

</body>

</html>