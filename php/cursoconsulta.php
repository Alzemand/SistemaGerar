<?php
include('conexao.php');

$termo = $_POST['pesquisa'];

$sql = "SELECT * FROM curso";

$result = $conn->query($sql);

$conn->close();

?>
