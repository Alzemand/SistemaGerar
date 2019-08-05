<?php

include('conexao.php');
include('../validador/dinheiro.php');

$aluno = addslashes($_POST['aluno']);
$turma = addslashes($_POST['turma']);
$empresa = addslashes($_POST['empresa']);
$desconto = addslashes($_POST['desconto']);
$desconto = dinheiro($desconto);
$pagamento = addslashes($_POST['pagamento']);

$sql = "INSERT INTO matricula (aluno, empresa, turma, desconto, pagamento)
VALUES ('$aluno','$empresa', '$turma', '$desconto', '$pagamento')";


if ($conn->query($sql) === TRUE) {
    header("location: ../entities/matricula/matricula_cadastrar.php?cadastro=true"); 
}elseif (mysqli_errno($conn) == 1452) {
    header("location: ../entities/matricula/matricula_cadastrar.php?cadastro=erro");
}
else {
    echo "Error: " . $sql . "<br>" . $conn->errno;
}

$conn->close();

?>