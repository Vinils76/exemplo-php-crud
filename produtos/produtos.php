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
        table, td {
            border: 1px solid white;
            text-align: center;
            background-color: black;
            color: white;
        }

        table a {
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
                <th colspan="2">Operações</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($listaDeProdutos as $produtos) { ?>

            <tr>
                <td> <?=$produtos['id']?></td>
                <td> <?=$produtos['nome']?></td>
                <td> <?=$produtos['descricao']?></td>
                <td> <?=$produtos['preco']?></td>
                <td> <?=$produtos['quantidade']?></td>
                <td> <a href="atualizar.php?id=<?=$produtos['id']?>">Atualizar</a></td>
                <td> <a href="atualizar.php?id=<?=$produtos['id']?>">Excluir</a></td>
            </tr>

            <?php
            }
            ?>   
        </tbody>
    </table>
    
<p><a href="../produtos/inserir.php">Inserir Produto</a></p>

</body>
</html>