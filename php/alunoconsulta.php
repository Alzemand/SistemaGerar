<?php
include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file = $path . '/validador/mask.php';
include($file);

$cont = 1;
$termo = $_POST['pesquisa'];

$sql = "SELECT * FROM aluno 
WHERE nome LIKE '%$termo%' 
or cpf LIKE '%$termo%'
or email LIKE '%$termo%'
or telefone LIKE '%$termo%'
or profissao LIKE '%$termo%'
LIMIT $proximaPagina, $resultadosPorPagina;" ;


$result = $conn->query($sql);


$conn->close();

?>
