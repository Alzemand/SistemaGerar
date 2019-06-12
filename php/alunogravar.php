<?php

include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file = $path . '/validador/cpf.php';
$file2 = $path . '/validador/campo.php';
$file3 = $path . '/validador/formatar.php';
include($file);
include($file2);
include($file3);


$cpf = addslashes($_POST['cpf']);
$cpf = preg_replace("/[^0-9]/", "", $cpf);
$rg = addslashes($_POST['rg']);
$nome = addslashes($_POST['nome']);
$nome = formataCampo($nome);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$profissao = addslashes($_POST['profissao']);
$profissao = formataCampo($profissao);
$endereco = addslashes($_POST['endereco']);

// Iniciar sessão
session_start();

$_SESSION['cpf'] = $cpf;
$_SESSION['rg'] = $rg;
$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['telefone'] = $telefone;
$_SESSION['profissao'] = $profissao;
$_SESSION['endereco'] = $endereco;

if (validaCPF($cpf) == true && validaCampo($nome) == true) {
    $sql = "INSERT INTO aluno (cpf, rg, nome, telefone, email, profissao, endereco)
    VALUES ('$cpf', '$rg', '$nome', '$telefone', '$email', '$profissao', '$endereco')";
    if (mysqli_query($conn, $sql)) {
        unset($_SESSION['cpf']);
        unset($_SESSION['rg']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['telefone']);
        unset($_SESSION['profissao']);
        unset($_SESSION['endereco']);
        header("location: ../aluno_cadastrar.php?cpf=cadastrado&nome=$nome");
    }elseif (mysqli_errno($conn) == 1062) {
        header("location: ../aluno_cadastrar.php?cpf=duplicado");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} elseif (validaCPF($cpf) == true && validaCampo($nome) == false) {
    header("location: ../aluno_cadastrar.php?nome=erro");
} elseif (validaCPF($cpf) == false && validaCampo($nome) == true) {
    header("location: ../aluno_cadastrar.php?cpf=erro");
} else {
    header("location: ../aluno_cadastrar.php?cpf=erro&nome=erro");
}

mysqli_close($conn);

?>
