<?php
//Fazer os valores do preço  5000.00 para 5.000,00
function formatarPreco( float $valor ) :string {

 $valorFormatado = number_format($valor, 2, ",", ".");  
 
 return "R$ " . $valorFormatado;

}


function calcularTotal(float $valor, int $qtd):string {
    $total = $valor * $qtd;
    return formatarPreco($total);
}


