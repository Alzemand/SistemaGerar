<?php

function dinheiro($dado) {
    if ($dado != ""){
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $dado); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }
    else{
        return 0.0;
    }
}

// usar a função number_format() para devolver o valor
// $valor_servico = ' R$ ' . number_format($l['valor_servico'], 2, ',', '.');

?>