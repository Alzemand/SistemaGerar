<?php

include('conexao.php');

$cpf = addslashes($_GET['cpf']);
$cpf = preg_replace("/[^0-9]/", "", $cpf);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM aluno WHERE cpf = $cpf";

if ($conn->query($sql) === TRUE) {
    header("location: ../aluno_consultar.php?cpf=apagado");
} else {
    echo "Deu um erro fudido no sistema: " . $conn->error;
}

mysqli_close($conn);

?>
