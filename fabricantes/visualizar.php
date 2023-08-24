<?php
/* Importanto as funções de manipulação de fabricantes */
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerfabricantes($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>
</head>
<body>
    <h1>Fabricantes | SELECT -  
        <a href="../index.php">Home</a>
    </h1>

    <hr>
    <h2>Lendo e carregando todos os fabricantes.</h2>

    <p>
        <a href="inserir.php">Inserir novo fabricante</a>
    </p>
    
</body>
</html>