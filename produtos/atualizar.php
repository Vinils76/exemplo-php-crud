<?php
use CrudPoo\Produto;
use CrudPoo\Fabricante;
require_once '../vendor/autoload.php';

$produtos = new Produto;
$fabricante = new Fabricante;

$listaDeFabricantes = $fabricante->lerFabricantes();

$produtos->setId(
    $_GET['id'] );

// Chamando a função e recebendo os dados do produto
$arrProdutos = $produtos->lerUmProduto();

if ( isset($_POST['atualizar']) ){
    

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


    $produtos->atualizarProduto();

    header("location:produtos.php");
}
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
        <input value="<?=$arrProdutos['nome']?>" type="text" name="nome" id="nome" required>
    </p>

    <p>
        <label for="preco">Preço:</label>
        <input value="<?=$arrProdutos['preco']?> "type="number" min="0" max="10000" step="0.01" name="preco" id="preco" required>
    </p>

    <p>
        <label for="quantidade">Quantidade:</label>
        <input value="<?=$arrProdutos['quantidade']?>" type="number" min="0" max="100" name="quantidade" id="quantidade" required>
    </p>


    <p>
    <label for="fabricante">Fabricante:</label>
    <select name="fabricante" id="fabricante" required>
        <option value=""></option>
        <?php foreach($listaDeFabricantes as $fabricante) { ?>
            <option
        <?php
          /* Se chave estrangeira for idêntica à chave primária (ou seja,
            se o código do fabricante do produto bater com o código do 
            fabricante), então coloque o atributo selected no option */
            if($arrProdutos['fabricante_id'] === $fabricante['id']) echo "selected ";
            ?> 
                  value="<?=$fabricante['id']?>">
                    <?=$fabricante['nome']?>
            </option>
        <?php } ?>
        
    </select>
    </p>



    <p>
        <label for="descricao">Descrição:</label> <br>
        <textarea name="descricao" id="descricao" cols="30" rows="3"<?=$arrProdutos['descricao']?> required></textarea>
    </p>

    <button type="submit" name="atualizar">Atualizar Produto</button>
    
    </form>

    <p><a href="produtos.php">Visualizar Produtos</a></p>

    <p><a href="../index.php">Home</a></p>
    </div>
    
</body>
</html>