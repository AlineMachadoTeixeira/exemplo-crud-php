<?php
//Fazer os valores do preço  5000.00 para 5.000,00
function formatarPreco( float $valor ) :string {

 $valorFormatado = number_format($valor, 2, ",", ".");  
 
 return "R$ " . $valorFormatado;

}