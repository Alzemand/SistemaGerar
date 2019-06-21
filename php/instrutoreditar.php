<?php

include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file2 = $path . '/validador/campo.php';
$file3 = $path . '/validador/formatar.php';
$file4 = $path . '/validador/dinheiro.php';
include($file2);
include($file3);
include($file4);


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
    header("location: ../instrutor_visualizar.php?cpf=$cpf&atualizado=true");
} else {
    echo "Deu um erro fodido no sistema: " . $conn->error;
}


mysqli_close($conn);

?>
