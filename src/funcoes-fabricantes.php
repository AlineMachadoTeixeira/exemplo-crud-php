<?php
//  2º parte
/* Importando o script de conexão require_once garante que a importação é feita somente uma vez */
require_once "conecta.php";

//Usada em fabricantes/visualizar.php
// PDO $conexao esta no arquino conecta.php linha 23
function lerfabricantes(PDO $conexao ){
    $sql = "SELECT * FROM fabricantes ORDER BY nome";

    try{
        /* Método prepare():
        Faz uma preparação/pré-config do comando SQL e guarda em mémoria (Na variável que demos o nome $consulta) */
        $consulta = $conexao->prepare($sql);

        /* Método execute():
        Executa o comando SQL no banco de dados */
        $consulta-> execute();

        /* Método fetchAll():
        Busca todos os dados de consulta como um array associativo. */
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);   

    }catch(Exception $erro){
        die("Erro:" .$erro->getMessage());
    }

    return $resultado;
    //fim lerfabricantes   

    //Fazer a visualização disso no arquivo visializar.php
}//fim lerfabricantes   



// /Usada em fabricantes/inserir.php
function inserirFabricante(PDO $conexao, string $nomeDoFabricante ){
    /* :qualquer coisa (que está VALUES(:nome)) --> isso indica um "named paramenter"(parâmentro nomeado) */
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

    try {
        $consulta = $conexao->prepare($sql);

        /* bindValue() -> permite vincular o valor existente no parâmentro nomeado (:nome) à consulta que será executada. É necessário indicar qual é o parâmetro (:nome), de onde vem o valor ($nomeDoFabricante) e de que tipo ele é (PDO::PARAM_STR) */
        $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);
        $consulta->execute();
       
    } catch (Exception $erro) {
        die ("Erro ao inserir: ".$erro->getMessage());
    }

}//Fim inserirFabricante


// Usada em fabricantes/atualizar.php
function lerUmFabricante(PDO $conexao, int $idFabricante){
    $sql = "SELECT * FROM fabricantes WHERE id = :id";

    try {

        $consulta = $conexao->prepare($sql);       
        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
                                //fetch você pega um array 
                                //fetchAll pega todos array

       
    } catch (Exception $erro) {
        die ("Erro ao carregar: ".$erro->getMessage());
    }

    return $resultado;

} //Fim lerUmFabricante

//Exercício: IMPLEMENTE A FUNÇÃO ABAIXO
function atualizarFabricante(PDO $conexao, string $novoNomeFabricante, int $IdFabricante){
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id"; 


    try {
        $consulta = $conexao->prepare($sql);        
        $consulta->bindValue(":nome", $novoNomeFabricante, PDO::PARAM_STR);
        $consulta->bindValue(":id", $IdFabricante, PDO::PARAM_INT);
        $consulta->execute();
       
    } catch (Exception $erro) {
        die ("Erro novo fabricante: ".$erro->getMessage());
    }

    

}//Fim atualizarFabricante


