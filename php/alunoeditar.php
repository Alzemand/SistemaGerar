<?php

include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file2 = $path . '/validador/campo.php';
$file3 = $path . '/validador/formatar.php';

include($file2);
include($file3);


$cpf = addslashes($_POST['cpf']);
$cpf = preg_replace("/[^0-9]/", "", $cpf);
$rg = addslashes($_POST['rg']);
$nome = addslashes($_POST['nome']);
$nome = formataCampo($nome);
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$profissao = addslashes($_POST['profissao']);
$profissao = formataCampo($profissao);
$endereco = addslashes($_POST['endereco']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE aluno
        SET cpf = '$cpf', rg = '$rg', nome = '$nome', telefone = '$telefone',
        email = '$email', profissao = '$profissao', endereco = '$endereco'
        WHERE cpf = $cpf";

if ($conn->query($sql) === TRUE) {
    header("location: ../aluno_visualizar.php?cpf=$cpf&atualizado=true");
} else {
    echo "Deu um erro fudido no sistema: " . $conn->error;
}


mysqli_close($conn);

?>
