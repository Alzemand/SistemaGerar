<?php

include('conexao.php');

// Validador
include('../validador/campo.php');
include('../validador/formatar.php');
include('../validador/dinheiro.php');

$cpf = addslashes($_POST['cpf']);
$cpf = preg_replace("/[^0-9]/", "", $cpf);
$crea = addslashes($_POST['crea']);
$nome = addslashes($_POST['nome']);
$nome = formataCampo($nome);
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = addslashes($_POST['endereco']);
$valor = addslashes($_POST['valor']);
$valor = dinheiro($valor);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE instrutor
        SET cpf = '$cpf', nome = '$nome', telefone = '$telefone',
        email = '$email', crea = '$crea', endereco = '$endereco', valor = '$valor'
        WHERE cpf = $cpf";

if ($conn->query($sql) === TRUE) {
    header("location: ../entities/instrutor/instrutor_visualizar.php?cpf=$cpf&atualizado=true");
} else {
    echo "Deu um erro fodido no sistema: " . $conn->error;
}


mysqli_close($conn);

?>
