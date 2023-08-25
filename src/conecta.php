<!-- 1º parte / Só vai ter programação -->

<?php

// conecta.php

/* Script de conexão ao servidor de Banco de Dados */

//Parâmetros
$servidor = "localhost"; // servidor que está hospedado. No caso xampp/localhost
$usuario = "root";  // nome  que dão para xampp
$senha = "";
$banco = "vendas"; // o nome do banco de dados que você quer puxar


/* Configurações para conexão 
(API/Driver de conexão: PDO (PHP Data Object)) */

//try e catch descobrir erro de programação
try{
     // Instância/Objeto PDO para conexão
    //dbname data base 
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha
    );

    //Habilitar a verificações e sinalização de erros (exceções)
    $conexao->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

}catch(Exception $erro){
    /* Exception é uma classe/tipo de dados voltado para tratamento de exceções (erros) */
    die("Deu ruim:".$erro->getMessage());

}

