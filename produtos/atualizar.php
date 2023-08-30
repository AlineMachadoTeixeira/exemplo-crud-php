<?php
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerfabricantes($conexao);

require_once "../src/funcoes-produtos.php";

/* Caputurar/Sanitizar*/
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

/* Chamando a função e recuperando os dados de um produto de acordo com id passado */
$produto = lerUmProduto($conexao, $id);


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>

    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
        }   
        h1 {
            text-align: center;
        }    
        form {
            width: 50%;            
            margin: 0 auto; 
            background-color:cornsilk; 
            padding: 20px;         
        }       
        p {
            margin-bottom: 15px;            
        }       
        label {
            display: block;            
            font-weight: bold;            
        }        
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;            
            padding: 8px;            
            margin-top: 5px;            
            border: 1px solid #ccc;            
            border-radius: 4px;            
            box-sizing: border-box;            
        }
        
        button[type="submit"] {            
            color: #fff;           
            border: none;            
            border-radius: 4px;            
            padding: 10px 20px;            
            cursor: pointer;
            background-color: #0056b3;           
        }     
        button[type="submit"]:hover {
            background-color: #0056b3;           
        }
    </style>
</head>

<body>
    <h1> Produtos |SELECT/UPDATE </h1>
    <!-- Quando Você clicar em editar um fabricante na pasta visualizar.php o nome dos dados dos produtos precisa aparecer.   -->
    <hr>

    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?=$produto['nome']?>" required>
        </p>

        <p>
            <label for="preco">Preço:</label>
            <input type="number" min="10" max="10000" step="0.01" name="preco" id="preco" value="<?=$produto['preco']?>" required>
        </p>

        <p>
            <label for="quantidade">Quantidade:</label>
            <input type="number" min="1" max="100" name="quantidade" id="quantidade" value="<?=$produto['quantidade']?>" required>
        </p>

        <p>

            <label for="fabricante">Fabricante: </label>
            <select name="fabricante" id="fabricante"  >
             <option value=""></option>
                
                <?php 
                foreach ($listaDeFabricantes as $fabricante){
                ?>
                <!-- Lógica/algoritmo da seleção do fabricante se a chave estrangeira for identica à chave primaria, ou seja, se o id do fabricante do produto (coluna fabricante_id da tabela produto) for igual ao id do fabricante (coluna id da tabela fabricante), então coloque "selected" no <option>-->

                                             <!-- chave estrangeira === chave primaria  -->
                 <option  <?php if($produto["fabricante_id"] === $fabricante["id"])  echo " selected ";?> 
                    value="<?=$fabricante['id']?>">
                           <?=$fabricante['nome']?>
                </option> 

                <?php 
                }?>

            </select required>
        </p>

        <p>
            <label for="descricao">Descrição:</label><br>
            <textarea name="descricao" id="descricao"  cols="30" rows="3" ><?=$produto['descricao']?></textarea>
        </p>

        <button type="submit" name="atualizar">Atualizar produto</button>

    </form>

    <!-- value="<$produto['quantidade']  ?> com cada name="quantidade" é para exibir os valores de cada campo. No textarea não tem value faz diferente linha 106  -->

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>




</body>

</html>

