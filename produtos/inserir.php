<?php
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerfabricantes($conexao);

require_once "../src/funcoes-produtos.php";

// Fazendo o o inserir do botão e os filter_input de cada campo do produto inserir
if(isset($_POST['inserir'])){
   $nome = filter_input(
    INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

   $preco = filter_input(
    INPUT_POST, "preco",
    FILTER_SANITIZE_NUMBER_FLOAT,
    FILTER_FLAG_ALLOW_FRACTION
   );

   $quantidade = filter_input(
    INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT
   );

   //Pegaremos o value, ou seja, o valor do id do fabricante
   $fabricanteId = filter_input( 
    INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT
   );

   $descricao = filter_input(
    INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    inserirProduto(
        $conexao, $nome, $preco, $quantidade, $fabricanteId, $descricao);

    header("location:visualizar.php");

}
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
    <h1> Produtos | INSERT </h1>
    <hr>

    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p>

        <p>
            <label for="preco">Preço:</label>
            <input type="number" min="10" max="10000" step="0.01" name="preco" id="preco" required>
        </p>

        <p>
            <label for="quantidade">Quantidade:</label>
            <input type="number" min="1" max="100" name="quantidade" id="quantidade" required>
        </p>

        <p>

            <label for="fabricante">Fabricante: </label>
            <select name="fabricante" id="fabricante">
                <option value=""></option>
                <?php
                foreach ($listaDeFabricantes as $fabricante) {
                ?>
                    <option value="<?= $fabricante["id"] ?>"><?= $fabricante["nome"] ?></option>


                <?php
                }
                ?>
            </select required>
        </p>

        <p>
            <label for="descricao">Descrição:</label><br>
            <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
        </p>

        <button type="submit" name="inserir">Inserir produto</button>

    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>




</body>

</html>