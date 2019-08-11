<?php

function formataCampo($campo = null)
{
    // Formata o campo em primeira Maiúscula
    $ignore = 'de do das da dos';
    $campo = ucwords(mb_strtolower($campo));
    return str_replace(explode(' ', ucwords($ignore)), explode(' ', $ignore), $campo);
}
