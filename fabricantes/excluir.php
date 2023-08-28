<!-- Fazer o excluir funcionar -->
<?php

    //Inportando as função e conexão 
    require_once "../src/funcoes-fabricantes.php";

    /* Obtendo e sanitizando o valor vindo do parâmetro de URL (link dinâmico) */
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    /* Chamando a função e excluir os dados de um fabricante de acordo com id passado */
    $fabricante = lerUmFabricante($conexao, $id);

    if ( isset($_POST ['excluir'])){
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        deleteFabricante($conexao, $nome, $id);
        // header("location:visualizar.php");
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Ixcluir</title>
</head>
<body>
    <!-- Atualização | Excluir -->
    <h1> Fabricantes | SELECT/DELETE</h1>
    <hr>

    <form action="" method="post">
        <!-- Campos  aculto usado apenas registro no formulário do id do fabricante que está sendo visualizado. -->
        <input type="hidden" name="id" value="<?=$fabricante['id']?>">
        <p>
            <label for="nome">Nome:</label>
            <input value="<?=$fabricante['nome']?>" required type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="excluir">Excluir Fabricante</button>

    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>

    
    
</body>
</html>