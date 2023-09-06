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


function  inserirProduto(
   PDO $conexao, 
   string $nome, 
   float $preco, 
   int $quantidade, 
   int $fabricanteId, 
   string $descricao
   ):void {

    $sql = "INSERT INTO produtos(
      nome, preco, quantidade, descricao, fabricante_id) VALUES (
        :nome, :preco, :quantidade, :descricao, :fabricanteId
      )";
      // esses nomes com : :fabricanteId foi o mesmo nome do azul linha 36 a 40

      try{
        //$consulta também chamam de $query
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);

        /* No PDO, ao trabalhar com valores "quebrados/floar" para parâmetros nomeados, você deve usar a constante PARAM_STR. No momento, não ha outra forma do PDO de lidar com valores deste tipo devido aos diferentes tipos de dados que cada Banco de dados suporta. */
        $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);

        $consulta->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);

        $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);

        $consulta->bindValue(":fabricanteId", $fabricanteId, PDO::PARAM_INT);


        $consulta->execute();


      }catch(Exception $erro){
        die("Erro ao inserir: ".$erro->getMessage());
      }
   }


   function lerUmProduto(PDO $conexao, int $idProduto):array{
    $sql = "SELECT * FROM produtos WHERE id = :id";
    try {

        $consulta = $conexao->prepare($sql);       
        $consulta->bindValue(":id", $idProduto, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
                                //fetch você pega um array 
                                //fetchAll pega todos array       
    } catch (Exception $erro) {
        die ("Erro ao carregar protudos: ".$erro->getMessage());
    }

    return $resultado;    

} //Fim inserirProduto



function atualizarProduto(
  PDO $conexao, 
  int $id, 
  string $nome, 
  float $preco, 
  int $quantidade, 
  string $descricao,
  int $fabricanteId

):void {

  $sql = "UPDATE produtos SET
      nome = :nome, 
      preco = :preco,
      quantidade =:quantidade,
      descricao = :descricao,
      fabricante_id = :fabricanteId
      WHERE id = :id" ;

      try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);
        $consulta->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);
        $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);
        $consulta->bindValue(":fabricanteId", $fabricanteId, PDO::PARAM_INT);

        $consulta->execute();

      } catch (Exception $erro) {
        die("Erro ao atualizar: " .$erro->getMessage());
      }

} //Fim atualizarProduto



function excluirProduto(PDO $conexao, int $id):void{
  $sql = "DELETE FROM produtos WHERE id = :id";

  try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindValue(":id", $id, PDO::PARAM_INT);
      $consulta->execute();

  } catch (Exception $erro) {
      die("Erro ao excluir: " .$erro->getMessage());
  }

}//Fim excluirProduto
  

