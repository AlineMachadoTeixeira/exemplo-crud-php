<!-- Fazer o excluir funcionar -->
<?php    
    require_once "../src/funcoes-fabricantes.php";    
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);   
    $fabricante = lerUmFabricante($conexao, $id);
    if ( isset($_POST ['excluir'])){
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        execluirFabricante($conexao, $id);
        header("location:visualizar.php");
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Ixclusão</title>
</head>
<body>
    <!-- Atualização | Excluir -->
    <h1> Fabricantes | SELECT/DELETE</h1>
    <hr>
    <h2>Tem certeza que deseja excluir o fabricante abaixo?</h2>

    <form action="" method="post">
        <!-- Campos  aculto usado apenas registro no formulário do id do fabricante que está sendo visualizado. -->
        <input type="hidden" name="id" value="<?=$fabricante['id']?>">
        <p>
            <label for="nome">Nome:</label>
            <input disabled  value="<?=$fabricante['nome']?>" required type="text" name="nome" id="nome">
            <!-- disabled deixar o botão do formulario não usável  -->
        </p>
        <button type="submit" name="excluir">Excluir Fabricante</button>

    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>

    
    
</body>
</html>