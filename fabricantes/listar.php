<?php require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista</title>
</head>

<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso') { ?>
        <p>Fabricante atualizado com sucesso!</p>
    <?php } ?>


    <table>
        <caption>Lista de Fabricantes</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th colspan="2">Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // echo "<pre>";
            // var_dump($resultado); //teste
            // echo "</pre>";
            foreach ($listaDeFabricantes as $fabricante) { ?>
                <tr>
                    <td> <?= $fabricante['id'] ?></td>
                    <td> <?= $fabricante['nome'] ?></td>
                    <td> <a href="atualizar.php?id=<?= $fabricante['id'] ?>">Atualizar</a></td>
                    <td> <a class="excluir" href="excluir.php?id=<?= $fabricante['id'] ?>"> Excluir</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <p><a href="../fabricantes/inserir.php">Inserir fabricante</a></p>

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

</body>

</html>