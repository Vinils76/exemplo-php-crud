<?php

require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT produtos.id AS idProduto, produtos.nome AS produto, produtos.preco, produtos.descricao, produtos.preco, produtos.quantidade, fabricantes.nome AS fabricante FROM produtos
    INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id
     ORDER BY produto";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    } catch (Exception $erro) {
        die ("Erro: ".$erro->getMessage());
    }
    return $resultado;
};


function inserirProduto(PDO $conexao, string $nome, string $descricao, int $preco, int $quantidade, int $fabricante):void {
    $sql = "INSERT INTO produtos(nome, descricao, preco, quantidade, fabricante_id) VALUES(:nome, :descricao, :preco, :quantidade, :fabricante_id)";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $preco, PDO::PARAM_INT);
        $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $consulta->bindParam(':fabricante_id', $fabricante, PDO::PARAM_INT);

        $consulta->execute();

    } catch (Exception $erro) {
        die ("Erro: ".$erro->getMessage());
    }
};


// Função utilitárias
function dump($dados){
    echo "<pre>";
    var_dump($dados);
    echo "</pre>";
}

function formtaMoeda(float $valor):string {
    return "R$ ".number_format($valor, 2, '.', ',');
}

