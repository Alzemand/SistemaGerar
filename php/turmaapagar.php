<?php

include('conexao.php');

$codturma = addslashes($_GET['codturma']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM turma WHERE codturma = '$codturma'";

if ($conn->query($sql) === TRUE) {
    header("location: ../entities/turma/turma_consultar.php?codturma=apagado");
} else {
    echo "Deu um erro fodido no sistema: " . $conn->error;
}

mysqli_close($conn);

?>