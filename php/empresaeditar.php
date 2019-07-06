<?php

include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file2 = $path . '/validador/campo.php';
$file3 = $path . '/validador/formatar.php';

include($file2);
include($file3);


$cnpj = addslashes($_POST['cnpj']);
$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
$inscricao = addslashes($_POST['inscricao']);
$razao = addslashes($_POST['razao']);
$razao = formataCampo($razao);
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = addslashes($_POST['endereco']);
$responsavel = addslashes($_POST['responsavel']);
$responsavel = formataCampo($responsavel);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE empresa
        SET cnpj = '$cnpj', razao = '$razao', inscricao = '$inscricao', endereco = '$endereco',
        telefone = '$telefone', email = '$email', responsavel = '$responsavel' 
        WHERE cnpj = $cnpj ";

if ($conn->query($sql) === TRUE) {
    header("location: ../empresa_visualizar.php?cnpj=$cnpj&atualizado=true");
} else {
    echo "Deu um erro fodido no sistema: " . $conn->error;
}


mysqli_close($conn);

?>
