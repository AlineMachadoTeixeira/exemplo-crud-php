<!-- Fazer o inserir funcionar -->
<?php
//verificar se o formulário/botão  foi acionado 
//'inserir' está no name="inserir" linha 33 do button
if( isset($_POST['inserir'])){
    //Inportando as função e conexão 
    require_once "../src/funcoes-fabricantes.php";


    //Estamos capturando o valor digitado do nome e sanitizando
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

    // Pode fazer assim também
    // $nome = filter_var($_POST["nome"], FILTER_SANITIZE_SPECIAL_CHARS);


    //Chamar a função, passar os dados de conexão e o dado (nome do  fabricante) digitando no formulário
    inserirFabricante($conexao, $nome);

    /* Após inserir, redirecionamos para visualizacão */
    header("location:visualizar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserção</title>
</head>
<body>
    <h1> Fabricantes | INSERT </h1>
    <hr>

    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input required type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="inserir">Inserir Fabricante</button>

    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>


    
    
</body>
</html>