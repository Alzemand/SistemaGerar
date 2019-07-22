<?php

include('conexao.php');

$cnpj = addslashes($_GET['cnpj']);
$cnpj = preg_replace("/[^0-9]/", "", $cnpj);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM empresa WHERE cnpj = $cnpj";

if ($conn->query($sql) === TRUE) {
    header("location: ../entities/empresa/empresa_consultar.php?cnpj=apagado");
} else {
    echo "Deu um erro fodido no sistema: " . $conn->error;
}

mysqli_close($conn);

?>
