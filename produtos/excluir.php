<?php
require_once "../vendor/autoload.php";
$produtos = new CrudPoo\Produto;
$produtos->setId($_GET["id"]);
$produtos->excluirProduto();

header("location:produtos.php");
