<?php require_once "../src/funcoes-produtos.php";
$listaDeProdutos = lerProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <style>
        table, td, th {
            border: 1px solid white;
            text-align: center;
            background-color: black;
            color: white;
        }

        table a {
            text-decoration: none;
            color: white;
        }

        article {
            background-color: black;
            color: white;
            border: 1px solid white;
            padding: 5px;
            width: 60%;
        }

        article a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container2">
        <h1>Lista de Produtos</h1>
        <hr>
        <h2>Selecionando Produtos</h2>
    </div>

    <table>
        <caption>Lista de Produtos</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Fabricante</th>
                <th colspan="2">Operações</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($listaDeProdutos as $produtos) { ?>

            <tr>
                <td> <?=$produtos['idProduto']?></td>
                <td> <?=$produtos['produto']?></td>
                <td> <?=$produtos['descricao']?></td>
                <td> <?=$produtos['preco']?></td>
                <td> <?=$produtos['quantidade']?></td>
                <td> <?=$produtos['fabricante']?></td>
                <td> <a href="atualizar.php?id=<?=$produtos['idProduto']?>">Atualizar</a></td>
                <td> <a href="atualizar.php?id=<?=$produtos['idProduto']?>">Excluir</a></td>
            </tr>

            <?php
            }
            ?>   
        </tbody>
    </table>

    <div>
        <h1>Lista de Produtos</h1>
        <hr>
        <h2>Selecionando</h2>
    </div>

    <?php
    foreach ($listaDeProdutos as $produtos) { ?>
    <div class="produtos">
        <article>
            <h3><?=$produtos['produto']?></h3>
            <p>Descrição: <?=$produtos['descricao']?></p>
            <p>Preço: R$<?=formtaMoeda($produtos['preco'])?></p>
            <p>Quantidade: <?=$produtos['quantidade']?></p>
            <p>Fabricante: <?=$produtos['fabricante']?></p>
            <p><a href="atualizar.php?id=<?=$produtos['idProduto']?>">Atualizar</a>
            <a href="atualizar.php?id=<?=$produtos['idProduto']?>">Excluir</a></p>
        </article> 
    
    </div>
    <?php
    }
    ?>
   
<p><a href="../produtos/inserir.php">Inserir Produto</a></p>

</body>
</html>