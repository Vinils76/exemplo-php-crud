<?php
use CrudPoo\Fabricante;
use CrudPoo\Produto;
require_once '../vendor/autoload.php';

$fabricante = new Fabricante;
$produtos = new Produto;
$listaDeFabricantes = $fabricante->lerFabricantes();


if ( isset($_POST['inserir']) ){

    $produtos->setNome(
        $_POST['nome'] );

        $produtos->setPreco(
        $_POST['preco'] );

        $produtos->setQuantidade(
            $_POST['quantidade'] );

        $produtos->setDescricao(
        $_POST['descricao'] );

        $produtos->setFabricanteId(
            $_POST['fabricante'] );

    $produtos->inserirProduto();

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