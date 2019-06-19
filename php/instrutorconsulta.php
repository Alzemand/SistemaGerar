<?php
include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file = $path . '/validador/mask.php';
include($file);

$cont = 1;
$termo = $_POST['pesquisa'];

$sql = "SELECT * FROM instrutor 
WHERE nome LIKE '%$termo%' 
or cpf LIKE '%$termo%'
or email LIKE '%$termo%'
or telefone LIKE '%$termo%'
or crea LIKE '%$termo%'
ORDER BY nome
LIMIT $proximaPagina, $resultadosPorPagina" ;

$sqlcount = "SELECT * FROM instrutor";

$result = $conn->query($sql);

$contador = $conn->query($sqlcount);

if ($termo == ''){
    $total = $contador->num_rows; 
}else{
    $total = 1;
}


$conn->close();

?>
