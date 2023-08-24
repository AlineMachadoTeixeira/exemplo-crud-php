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

    <style>
        

        table, td, tr {
             border: 1px solid; 
             border-collapse: collapse;  
             margin: auto; 
             background-color: cornsilk;          
        }      
        
        caption{          
              font-size: 30px;
              padding: 5px;              
        }

        th{
            background-color: #000000;
            color: #fff;
            padding: 10px;            
        }

        td{ 
            padding: 10px 50px;               
        }      

        tr:hover{
            background-color: bisque;
            color: #000000;
        }
    </style>


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

    <!-- Fazer a saída de dados com uma tabela -->
    <table>
        <caption>Lista de Fabricantes</caption>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th colspan="2">Operação</th>
        </tr>

   <?php 
   foreach ($listaDeFabricantes  as $listaDeFabricante ){       
   ?>  
            
        <tr>
            <td><?=$listaDeFabricante["id"]?></td>
            <td><?=$listaDeFabricante["nome"]?></td>
            <td><a href="">Editar</a>  <a href="">Excluir</a></td>                
        </tr>      
   <?php       
     }
   ?>
    </table>
    
</body>
</html>