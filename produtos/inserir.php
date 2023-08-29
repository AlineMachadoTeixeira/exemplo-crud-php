<?php
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerfabricantes($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>

    <style>
         body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
        }        

        h1 {
            text-align: center;
        }

        form{
            background-color:cornsilk;
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        input{
            margin: auto;
            width: 70%;            
            padding: 8px;

        }

        
    </style>
</head>
<body>
    <h1> Produtos | INSERT </h1>
    <hr>

    <form action="" method="post">
        <p> 
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="mome" required>
        </p>

        <p> 
            <label for="preco">Preço:</label>
            <input type="number" min="10" max="10000" step="0.01" name="nome" id="mome" required>
        </p>

        <p> 
            <label for="quantidade">Quantidade:</label>
            <input type="number" min="1" max="100"  name="quantidade" id="quantidade" required>
        </p>

        <p>
            
            <label for="fabricante">Fabricante: </label>
            <select 
                name="fabricante" id="fabricante">
                <option value=""></option>
                <?php
                foreach ($listaDeFabricantes as $fabricante){                
                ?>
                <option value="<?=$fabricante["id"]?>"><?=$fabricante["nome"]?></option>
                

                <?php
                }
                ?>
            </select required>
        </p>

        <p>
            <label for="descricao">Descricao:</label><br>
            <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
        </p>

        <button type="submit" name="inserir">Inserir produto</button>



    </form>

    

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>


    
    
</body>
</html>