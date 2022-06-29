

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>

<?php
require_once '../vendor/autoload.php';

$fabricante = new CrudPoo\Fabricante;

$fabricante->setId( $_GET["id"] );

$arrFabricante = $fabricante->lerUmFabricante();

if(isset($_POST['atualizar'])) {
    $fabricante->setNome( $_POST["nome"]);

    $fabricante->atualizarFabricante();

    // echo "<p>Fabricante atualizado com sucesso!</p>";
    // header("Refresh:5; url=listar.php");

    header("location:listar.php?status=sucesso");
}
?>

        <form action="" method="post">
            <input type="hidden" name="<?=$arrFabricante['nome']?>">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$arrFabricante['nome']?>"type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar">Atualizar fabricante</button>
        </form>

        <p><a href="../fabricantes/listar.php">Visualizar Fabricantes</a></p>
    </div>


    
</body>
</html>