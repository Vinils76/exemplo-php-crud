<?php
// Verificando se o botão do formulário foi acionado
if ( isset($_POST['inserir']) ){
    // Importando as funções e a conexão
    require_once '../vendor/autoload.php';

    $fabricante = new CrudPoo\Fabricante;

    $fabricante->setNome(
        $_POST['nome'] );

    // Capturando o que foi digitado no campo nome
    // $nome = $_POST['nome'];


    // Chamando a função e passando dados de conexão e o nome digitado
    $fabricante->inserirFabricante();

    //Redirecionando
    header("location:listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserir</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | INSERT</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="inserir">Inserir fabricante</button>
        </form>

        <p><a href="../fabricantes/listar.php">Visualizar Fabricantes</a></p>
    </div>


    
</body>
</html>