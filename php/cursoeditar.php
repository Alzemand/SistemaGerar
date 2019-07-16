<?php

include('conexao.php');

$nome = addslashes($_POST['nome']);
$nome = strtoupper($nome);
$cargahoraria = addslashes($_POST['cargahoraria']);
$descricao = addslashes($_POST['descricao']);
$validade = addslashes($_POST['validade']);

$sql = "UPDATE curso 
        SET nome = '$nome', cargahoraria = '$cargahoraria',
        descricao = '$descricao', validade = '$validade'
        WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../curso_visualizar.php?id=$id&atualizado=true");
} else {
    echo "Deu um erro fodido no sistema: " . $conn->error;
}

$conn->close();
?>

