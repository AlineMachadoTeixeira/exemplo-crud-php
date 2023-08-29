<?php
/* Importanto as funções de manipulação de fabricantes */
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerfabricantes($conexao);


/* Contando quantos fabricantes temos na matriz  $listaDeFabricantes*/
$quantidade = count($listaDeFabricantes);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>

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
        
        table{            
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
        }

        table, td, tr {
             border: 1px solid; 
             border-collapse: collapse;  
             margin: auto; 
             background-color: cornsilk          
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
            background-color: cornsilk;
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

    <!-- Feedback/mensagem para o usuário indicando que o processo deu certo. Vai parecer a mensagem do h2 assim que Edita/Atualizar o fabricante -->
    <?php
    if(isset($_GET["status"]) && $_GET["status"] ==="sucesso"){
    ?>

    <h2 style="color:blue">Fabricante atualizado com sucesso</h2>

    
    <?php
    }    
    ?>

    <!-- Fazer a saída de dados com uma tabela -->
    <table>
        <caption>Lista de Fabricantes <b><?=$quantidade?></b></caption>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th colspan="2">Operação</th>
        </tr>

   <?php 
   foreach ($listaDeFabricantes  as $fabricante ){       
   ?>  
            
        <tr>
            <td><?=$fabricante["id"]?></td>
            <td><?=$fabricante["nome"]?></td>
            <td>
            <!-- Criar um link Dinamico vamos pegar o id, pois cada fabricante tem seu id 

            Link Dinamico 
            A URL do href precisa de parâmetro com dados dinamicois (no caso, o ID de cada fabricante)-->
                <a href="atualizar.php?id=<?=$fabricante["id"]?>">Editar</a>  
                <a class="excluir" href="excluir.php?id=<?=$fabricante["id"]?>">Excluir</a> 
                <!-- class="excluir" para usar o javascript -->
            </td>                
        </tr>      
   <?php       
     }
   ?>
    </table>
    
    <script src="../js/confirma-exclusao.js"></script>
</body>
</html>