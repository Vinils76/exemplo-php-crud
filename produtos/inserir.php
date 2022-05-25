<?php

?>
<?php

if ( isset($_POST['inserir']) ){
    require_once '../src/funcoes-produtos.php';

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_INT);

    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

    $fabricante = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_NUMBER_INT);

    $inserirProduto = inserirProduto($conexao, $nome, $descricao, $preco, $quantidade, $fabricante);

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
        <input type="text" name="nome" id="nome" required>
    </p>

    <p>
        <label for="preco">Preço:</label>
        <input type="number" min="0" max="10000" step="0.01"name="preco" id="preco" required>
    </p>

    <p>
        <label for="quantidade">Quantidade:</label>
        <input type="number" min="0" max="100" name="quantidade" id="quantidade" required>
    </p>

<?php 
foreach($inserirProduto as $inserir) { ?>
    <p>
    <label for="fabricante">Fabricante:</label>
    <select name="fabricante" id="fabricante" required>
        <option value="<?=$inserir['fabricante']?>"></option>
        <!-- Opções de Fabricantes -->
    </select>
    </p>

<?php
}
?>

    <p>
        <label for="descricao">Descrição:</label> <br>
        <textarea name="descricao" id="descricao" cols="30" rows="3" required></textarea>
    </p>

    <button type="submit" name="inserir">Inserir Produto</button>
    </form>

    <p><a href="produtos.php">Visualizar Produtos</a></p>
    </div>
    
</body>
</html>