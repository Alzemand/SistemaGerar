<!DOCTYPE html>
<html lang="pt-br">

<?php
include('../../head.php');
?>

<body>

  <div style="margin-top: 130px;">
  </div>

  <?php
    include('../../header.php');
    include('../../validador/mask.php');
    include('../../php/conexao.php');
    $cnpj = addslashes($_GET['cnpj']);
  
    $sql = "SELECT * FROM empresa WHERE cnpj='$cnpj'";
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
                <h5>Editar empresa</h5>
              </div><br>
              <!-- Formulário -->
              <form method="POST" action="/SistemaGerar/php/empresaeditar.php">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" class="form-control" id="cnpj" value=" ' . mask($row["cnpj"], '##.###.###/####-##') . '" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inscricao">Inscrição estadual</label>
                    <input type="text" name="inscricao" class="form-control" id="inscricao" value="'. $row["inscricao"] . '">
                  </div>
                </div>
                <div class="form-group">
                  <label for="razao">Razão social</label>
                  <input type="text" name="razao" class="form-control" id="razao" value="'. $row["razao"] . '" placeholder="Razão social">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" value="'. $row["email"] . '" placeholder="email@servidor.com">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="telefone form-control" id="telefone" value="'. $row["telefone"] . '" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" name="endereco" class="form-control" id="endereco" value="'. $row["endereco"] . '" placeholder="Rua dos Bobos, nº 0 - Av. Projetada">
                </div>

                <div class="form-group">
                  <label for="responsavel">Responsável</label>
                  <input type="text" name="responsavel" class="form-control" id="responsavel" value="'. $row["responsavel"] . '" placeholder="">
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
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>