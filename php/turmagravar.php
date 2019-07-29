<?php

include('conexao.php');
include('../validador/dinheiro.php');

$codturma = addslashes($_POST['codturma']);
$codturma = strtoupper($codturma);
$curso = addslashes($_POST['curso']);
$instrutor = addslashes($_POST['instrutor']);
$valor = addslashes($_POST['valor']);
$valor = dinheiro($valor);
$datainicio = addslashes($_POST['datainicio']);
$datafim = addslashes($_POST['datafim']);

$sql = "INSERT INTO turma (codturma, curso, instrutor, datainicio, datafim, valor)
VALUES ('$codturma', '$curso', '$instrutor', '$datainicio', '$datafim', '$valor')";

// Iniciar sessão
session_start();
$_SESSION['codturma'] = $codturma;

if ($conn->query($sql) === TRUE) {
    header("location: ../entities/turma/turma_cadastrar.php?codturma=cadastrado");
    }   
elseif (mysqli_errno($conn) == 1062) {
        header("location: ../entities/turma/turma_cadastrar.php?codturma=duplicado");
    }
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);

?>
