<?php
include('conexao.php');

// Validador
$path = dirname(__DIR__);
$file = $path . '/validador/mask.php';
include($file);

$cont = 1;
$sql = "SELECT * FROM aluno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo('
        <tr>
            <th scope="row">' . $cont . '</th>
            <td>' . $row["nome"] . '</td>
            <td>' . mask($row["cpf"],'###.###.###-##') . '</td>
            <td>' . $row["email"] . '</td>
            <td>' . $row["telefone"] . '</td>
            <td>' . $row["profissao"] . '</td>

            <td>
            <a class="btn btn-primary" href="aluno_visualizar.php?cpf='. $row["cpf"] .'" role="button">Ver</a>
            <a class="btn btn-primary" href="#" role="button">Editar</a>
            <a class="btn btn-primary" href="#" role="button">Apagar</a>
            </td>
        </tr>');
        $cont = $cont + 1;
    }
} else {
    echo "0 results";
}

$conn->close();
