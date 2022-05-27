<?php
require_once '../src/funcoes-fabricantes.php';
require_once '../src/funcoes-produtos.php';
$listaDeFabricantes = lerFabricantes($conexao);

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$produto = lerUmProduto($conexao, $id)

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | Atualizar</title>
</head>
<body>
    
    <div class="conteiner">
    <h1>Produtos UPDATE</h1>
    <hr>


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
        <option value="atualizar.php?id=<?= $fabricante['id']?>">
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

    <button type="submit" name="atualizar">Atualizar Produto</button>
    
    </form>

    <p><a href="produtos.php">Visualizar Produtos</a></p>

    <p><a href="../index.php">Home</a></p>
    </div>
    
</body>
</html>