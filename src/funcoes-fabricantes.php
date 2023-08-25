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
}

//Fazer a visualização disso no arquivo visializar.php
