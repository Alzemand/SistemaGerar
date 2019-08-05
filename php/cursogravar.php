<?php

include('conexao.php');

$nome = addslashes($_POST['nome']);
$nome = strtoupper($nome);
$cargahoraria = addslashes($_POST['cargahoraria']);
$descricao = addslashes($_POST['descricao']);
$validade = addslashes($_POST['validade']);

$sql = "INSERT INTO curso (nome, cargahoraria, descricao, validade)
VALUES ('$nome', $cargahoraria, '$descricao', $validade)";

if ($conn->query($sql) === TRUE) {
    header("location: ../entities/curso/curso_cadastrar.php?curso=cadastrado&nome=$nome");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>