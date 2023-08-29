<?php
require_once "../src/funcoes-produtos.php";
$listaDeProdutos = lerProdutos($conexao);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>
    <style>

        *{box-sizing: border-box;}

        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
        }        

        h1, h2 {
            text-align: center;
        }

        p a{
            font-size: 25px;
            margin: 10px;
        }
        

        .produtos{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;          
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            width: 70%;
            margin: auto;
            margin-top: 30px;
            font-size: 16px;
            
        }

        .produto {
            background-color:cornsilk;
            padding: 1rem;
            width: 49%;
            border-radius: 10px;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);

        }
    </style>
</head>
<body>

<h1> Produtos | SELECT <a href="../index.php">Home</a> </h1>
<hr>
<h2>Lendo e carregando todos os produtos.</h2>

<p>
    <a href="inserir.php">Inserir novo produto</a>    
</p>

<div class="produtos">

    <?php 
    foreach( $listaDeProdutos as $produto){ 
    ?>
    <article class="produto">
        <h3><?=$produto["nome"]?></h3>
        <p><b>Preço:</b> <?=$produto["preco"]?></p>
        <p><b>Quantidade:</b> <?=$produto["quantidade"]?></p>
    </article>

    <?php
    }
    ?>   

</div>
    
</body>
</html>