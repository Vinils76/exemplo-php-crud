<?php
require_once '../src/funcoes-fabricantes.php';
$listaDeFabricantes = lerFabricantes($conexao);

if ( isset($_POST['inserir']) ){
    require_once '../src/funcoes-produtos.php';

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

    $fabricante = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_NUMBER_INT);

    inserirProduto($conexao, $nome, $preco, $quantidade, $descricao, $fabricante);

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
        <input type="number" min="0" max="10000" step="0.01" name="preco" id="preco" required>
    </p>

    <p>
        <label for="quantidade">Quantidade:</label>
        <input type="number" min="0" max="100" name="quantidade" id="quantidade" required>
    </p>


    <p>
    <label for="fabricante">Fabricante:</label>
    <select name="fabricante" id="fabricante" required>
    <?php 
    foreach ($listaDeFabricantes as $fabricante) { ?>
        <option value="<?=$fabricante['id']?>">
            <?=$fabricante['nome']?>
        </option>
        <!-- Opções de Fabricantes -->
    <?php
    }
    ?>
    </select>
    </p>



    <p>
        <label for="descricao">Descrição:</label> <br>
        <textarea name="descricao" id="descricao" cols="30" rows="3" required></textarea>
    </p>

    <button type="submit" name="inserir">Inserir Produto</button>
    </form>

    <p><a href="produtos.php">Visualizar Produtos</a></p>
    </div>

    <p><a href="../index.php">Home</a></p>
    
</body>
</html>