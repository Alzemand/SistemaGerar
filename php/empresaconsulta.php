<?php
include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file = $path . '/validador/mask.php';
include($file);

$cont = 1;
$termo = $_POST['pesquisa'];

$sql = "SELECT * FROM empresa 
WHERE razao LIKE '%$termo%' 
or cnpj LIKE '%$termo%'
or inscricao LIKE '%$termo%'
or telefone LIKE '%$termo%'
or email LIKE '%$termo%'
ORDER BY razao
LIMIT $proximaPagina, $resultadosPorPagina" ;

$sqlcount = "SELECT * FROM empresa";

$result = $conn->query($sql);

$contador = $conn->query($sqlcount);

if ($termo == ''){
    $total = $contador->num_rows; 
}else{
    $total = 1;
}


$conn->close();

?>
