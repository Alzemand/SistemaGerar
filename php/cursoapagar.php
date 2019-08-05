<?php

include('conexao.php');

$id = addslashes($_GET['id']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM curso WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("location: ../entities/curso/curso_consultar.php?curso=apagado");
}
elseif (mysqli_errno($conn) == 1451) { 
    header("location: ../entities/curso/curso_consultar.php?curso=chave"); 
}
else {
    echo "Deu um erro fodido no sistema: " . $conn->errno;
}

mysqli_close($conn);

?>
