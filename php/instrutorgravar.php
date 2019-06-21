<?php

include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file = $path . '/validador/cpf.php';
$file2 = $path . '/validador/campo.php';
$file3 = $path . '/validador/formatar.php';
$file4 = $path . '/validador/dinheiro.php';
include($file);
include($file2);
include($file3);
include($file4);


$cpf = addslashes($_POST['cpf']);
$cpf = preg_replace("/[^0-9]/", "", $cpf);
$crea = addslashes($_POST['crea']);
$nome = addslashes($_POST['nome']);
$nome = formataCampo($nome);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$endereco = addslashes($_POST['endereco']);
$valor = addslashes($_POST['valor']);
$valor = dinheiro($valor);

// Iniciar sessão
session_start();

$_SESSION['cpf'] = $cpf;
$_SESSION['crea'] = $crea;
$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['telefone'] = $telefone;
$_SESSION['endereco'] = $endereco;
$_SESSION['valor'] = $valor;

if (validaCPF($cpf) == true && validaCampo($nome) == true) {
    $sql = "INSERT INTO instrutor (cpf, nome, telefone, email, crea, endereco, valor)
    VALUES ('$cpf', '$nome', '$telefone', '$email', '$crea', '$endereco', '$valor')";
    if (mysqli_query($conn, $sql)) {
        unset($_SESSION['cpf']);
        unset($_SESSION['nome']);
        unset($_SESSION['telefone']);
        unset($_SESSION['crea']);
        unset($_SESSION['email']);
        unset($_SESSION['endereco']);
        unset($_SESSION['valor']);
        header("location: ../instrutor_cadastrar.php?cpf=cadastrado&nome=$nome");
    }elseif (mysqli_errno($conn) == 1062) {
        header("location: ../instrutor_cadastrar.php?cpf=duplicado");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} elseif (validaCPF($cpf) == true && validaCampo($nome) == false) {
    header("location: ../instrutor_cadastrar.php?nome=erro");
} elseif (validaCPF($cpf) == false && validaCampo($nome) == true) {
    header("location: ../instrutor_cadastrar.php?cpf=erro");
} else {
    header("location: ../instrutor_cadastrar.php?cpf=erro&nome=erro");
}

mysqli_close($conn);

?>
