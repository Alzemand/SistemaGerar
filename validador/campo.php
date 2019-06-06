<?php

function validaCampo($campo = null) {

// Verifica se o campos esta vazio
    if(empty($campo)) {
        return false;
    }else{
        return true;
    }
}
?>