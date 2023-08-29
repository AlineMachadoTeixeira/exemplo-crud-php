<?php
require_once "../src/funcoes-produtos.php";
$listaDeProdutos = lerProdutos($conexao);
?>

<?php
require_once "../src/funcoes-utilitarias.php";
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
        <h3><?=$produto["produto"]?></h3> <!-- ["produto"] por causa da "../src/funcoes-produtos.php" linha 11 --> 
        <h4><?=$produto["fabricante"]?></h4> <!-- ["fabricante"] por causa da "../src/funcoes-produtos.php" linha 14 -->
        <p><b>Preço:</b> <?=formatarPreco($produto["preco"])?></p> <!-- formatarPreco pegou da pasta ../src/funcoes-utilitarias.php -->
        <p><b>Quantidade:</b> <?=$produto["quantidade"]?></p>

              <!-- Exercício/Desafio 02 somar preço e quantidade e fazer o tatal -->

         <!-- Solução 1: fazer a conta diretamente e passar o resultado pra formatação do preço -->
        <P><b>Total solução 1:</b><?=formatarPreco($produto["preco"] * $produto["quantidade"])?></P>


        <!-- Solução 2: Fazer a conta direto na query SQL e pegar
            o resultado (coluna total) - além de passar pra formatação pasta funcoes-produto.php linha 15-->
        <P><b>Total solução 2 :</b><?=formatarPreco($produto["preco"] * $produto["quantidade"])?></P>


         <!-- Solução 3) Fazer uma função de cálculo e pegar o 
            resultado dela já calculado e formatado  função-utilitaria.php  linha 12-->
        <p><b>Total solução 3:</b> 
        <?=calcularTotal($produto["preco"], $produto["quantidade"])?></p>
    </article>

    <?php
    }
    ?>   

</div>
    
</body>
</html>