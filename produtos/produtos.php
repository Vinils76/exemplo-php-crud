<?php
use CrudPoo\Produto;

require_once "../vendor/autoload.php";

$produtos = new Produto;
$listaDeProdutos = $produtos->lerProdutos();
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
                <th>Nome</th>
                <th>preco</th>
                <th>quantidade</th>
                <th>descricao</th>
                <th>Fabricante</th>
                <th colspan="2">Operações</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($listaDeProdutos as $produtos) { ?>

            <tr>
                <td> <?=$produtos['produto']?></td>
                <td> <?=number_format($produtos['preco'], 2, ",", ".")?></td>
                <td> <?=$produtos['quantidade']?> itens</td>
                <td> <?=$produtos['descricao']?></td>
                <td> <?=$produtos['fabricante']?></td>
                <td> <a href="atualizar.php?id=<?=$produtos['idProduto']?>">Atualizar</a></td>
                <td> <a href="excluir.php?id=<?=$produtos['idProduto']?>" class="excluir">Excluir</a></td>
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
            <p>preco:<?=number_format($produtos['preco'], 2, ",", ".")?></p>
            <p>quantidade: <?=$produtos['quantidade']?> itens</p>
            <p>descricao: <?=$produtos['descricao']?></p>
            <p>Fabricante: <?=$produtos['fabricante']?></p>
            <p><a href="atualizar.php?id=<?=$produtos['idProduto']?>">Atualizar</a>
            <a href="excluir.php?id=<?=$produtos['idProduto']?>" class="excluir">Excluir</a></p>
        </article> 
    
    </div>
    <?php
    }
    ?>

<script>
        const links = document.querySelectorAll('.excluir');

        for (let i = 0; i < links.length; i++) {
            links[i].addEventListener("click", function(event) {

                event.preventDefault();

                let resposta = confirm("Deseja realmente excluir?");
                if (resposta) {
                    location.href = links[i].getAttribute('href');
                }


            });
        }
    </script>

   
<p><a href="../produtos/inserir.php">Inserir Produto</a></p>

</body>
</html>