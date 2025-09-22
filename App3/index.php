<?php

function stringParaBinario($string)  {


    $binario = '';
    foreach(str_split($string) as $char) {

        $binario .= str_pad(decbin(ord($char)), 8, '0', STR_PAD_LEFT)   . '';
    }
    return $binario;
}

// Exemplo de uso 
$frase = "Gustavo de Oliveira Kubota";
$fraseBinario = stringParaBinario($frase);

//Exibindo a frase original e sua versão binária
echo "Frase original: " . $frase . "<br>";
echo "Frase em binário: " . $fraseBinario;

?>
