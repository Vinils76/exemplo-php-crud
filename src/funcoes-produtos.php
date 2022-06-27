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


function inserirProduto(PDO $conexao, string $nome, float $preco, int $quantidade, string $descricao, int $fabricante):void {
    $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) VALUES(:nome, :preco, :quantidade, :descricao, :fabricante_id)";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
        $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $consulta->bindParam(':fabricante_id', $fabricante, PDO::PARAM_INT);

        $consulta->execute();

    } catch (Exception $erro) {
        die ("Erro: ".$erro->getMessage());
    }
};


function atualizarProduto(PDO $conexao, int $id, string $nome, float $preco, int $quantidade, string $descricao, int $fabricante):void {
    $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, fabricante_id= :fabricante WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
        $consulta->bindParam('quantidade', $quantidade, PDO::PARAM_INT);
        $consulta->bindParam('descricao', $descricao, PDO::PARAM_STR);
        $consulta->bindParam(':fabricante', $fabricante, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}

function lerUmProduto(PDO $conexao, int $id):array {
    $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM
    produtos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}

function excluirProduto (PDO $conexao, int $id):void {
    $sql = "DELETE FROM produtos WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}







// Função utilitárias
function dump($dados){
    echo "<pre>";
    var_dump($dados);
    echo "</pre>";
}

function formataMoeda(float $valor):string {
    return "R$ ".number_format($valor, 2, ',', '.');
}

