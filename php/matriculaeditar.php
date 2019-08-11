<?php

include('conexao.php');

$id = addslashes($_GET['id']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE matricula 
        SET pagamento = '1'
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("location: ../entities/matricula/matricula_consultar.php?id=pago");
} else {
    echo "Deu um erro fodido no sistema: " . $conn->error;
}

mysqli_close($conn);

?>
