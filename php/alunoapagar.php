<?php

include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file2 = $path . '/validador/campo.php';
$file3 = $path . '/validador/formatar.php';

include($file2);
include($file3);


$cpf = $_POST['cpf'];
$cpf = preg_replace("/[^0-9]/", "", $cpf);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM aluno WHERE cpf = $cpf";

if ($conn->query($sql) === TRUE) {
    header("location: ../aluno_visualizar.php?cpf=$cpf&atualizado=true");
} else {
    echo "Deu um erro fudido no sistema: " . $conn->error;
}


mysqli_close($conn);

?>