<?php

function formataCampo($campo = null) {
// Formata o campo em primeira Maiúscula
    $campo = strtolower($campo);
    $campo = ucwords($campo);
    return $campo;
}
?>