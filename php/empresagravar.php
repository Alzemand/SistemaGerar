<?php

include('conexao.php');

// Validador
include('../validador/cnpj.php');
include('../validador/campo.php');
include('../validador/formatar.php');


$cnpj = addslashes($_POST['cnpj']);
$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
$inscricao = addslashes($_POST['inscricao']);
$razao = addslashes($_POST['razao']);
$razao = formataCampo($razao);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$endereco = addslashes($_POST['endereco']);
$responsavel = addslashes($_POST['responsavel']);
$responsavel = formataCampo($responsavel);

// Iniciar sessão
session_start();

$_SESSION['cnpj'] = $cnpj;
$_SESSION['inscricao'] = $inscricao;
$_SESSION['razao'] = $razao;
$_SESSION['email'] = $email;
$_SESSION['telefone'] = $telefone;
$_SESSION['endereco'] = $endereco;
$_SESSION['responsavel'] = $responsavel;

if (validaCNPJ($cnpj) == true && validaCampo($razao) == true) {
    $sql = "INSERT INTO empresa (cnpj, razao, inscricao, endereco, telefone, email, responsavel)
    VALUES ('$cnpj', '$razao', '$inscricao', '$endereco', '$telefone', '$email', '$responsavel')";
    if (mysqli_query($conn, $sql)) {
        unset($_SESSION['cnpj']);
        unset($_SESSION['razao']);
        unset($_SESSION['inscricao']);
        unset($_SESSION['endereco']);
        unset($_SESSION['telefone']);
        unset($_SESSION['email']);
        unset($_SESSION['responsavel']);
        header("location: ../entities/empresa/empresa_cadastrar.php?cnpj=cadastrado&razao=$razao");
    }elseif (mysqli_errno($conn) == 1062) {
        header("location: ../entities/empresa/empresa_cadastrar.php?cnpj=duplicado");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} elseif (validaCNPJ($cnpj) == true && validaCampo($razao) == false) {
    header("location: ../entities/empresa/empresa_cadastrar.php?razao=erro");
} elseif (validaCNPJ($cnpj) == false && validaCampo($razao) == true) {
    header("location: ../entities/empresa/empresa_cadastrar.php?cnpj=erro");
} else {
    header("location: ../entities/empresa/empresa_cadastrar.php?cnpj=erro&razao=erro");
}

mysqli_close($conn);

?>
