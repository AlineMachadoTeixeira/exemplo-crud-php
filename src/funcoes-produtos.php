<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao):array{
     // Versão 1 (Dados somente da tabela produtos)
    // $sql = "SELECT nome, preco, quantidade FROM produtos ORDER BY nome";

    //Versão 2 (Dados das duas tabelas: produtos e fabricantes)
    $sql = "SELECT
                produtos.id, 
                produtos.nome  AS produto, 
                produtos.preco, 
                produtos.quantidade,
                fabricantes.nome AS fabricante,
                (produtos.preco * produtos.quantidade) As total
            FROM produtos INNER JOIN fabricantes 
            ON produtos.fabricante_id = fabricantes.id
            
            ORDER BY produto";

    try {
      $consulta = $conexao->prepare($sql);
      $consulta->execute();
      $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);      
    }catch (Exception $erro){
        die("Erro ao carregar produtos: ".$erro->getMessage());
    }

    return  $resultado;       
     
}




  

  