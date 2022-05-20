

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
require_once '../src/funcoes-fabricantes.php';
// Obtendo o valor do parâmetro da URL
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$fabricante = lerUmFabricante($conexao, $id);

if(isset($_POST['atualizar'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    atualizarFabricante($conexao, $id, $nome);

    // echo "<p>Fabricante atualizado com sucesso!</p>";
    // header("Refresh:5; url=listar.php");

    header("location:listar.php?status=sucesso");
}
?>

        <form action="" method="post">
            <input type="hidden" name="<?=$fabricante['nome']?>">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$fabricante['nome']?>"type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar">Atualizar fabricante</button>
        </form>

        <p><a href="../fabricantes/listar.php">Visualizar Fabricantes</a></p>
    </div>


    
</body>
</html>