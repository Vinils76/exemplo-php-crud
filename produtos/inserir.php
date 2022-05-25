<?php

if ( isset($_POST['inserir']) ){
    require_once '../src/funcoes-produtos.php';

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_INT);

    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

    $fabricante = filter_input(INPUT_POST, 'fabricante_id', FILTER_SANITIZE_NUMBER_INT);

    inserirProduto($conexao, $nome, $descricao, $preco, $quantidade, $fabricante);

    header("location:produtos.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | INSERT</title>
</head>
<body>
    <div class="conteiner">
    <form action="" method="post">
    <p>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
    </p>
    <p>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao">
    </p>
    <p>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco">
    </p>
    <p>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade">
    </p>
    <button type="submit" name="inserir">Inserir Produto</button>
    </form>

    <p><a href="produtos.php">Visualizar Produtos</a></p>
    </div>
    
</body>
</html>