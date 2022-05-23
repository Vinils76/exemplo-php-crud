<?php

require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT id, nome, descricao, preco, quantidade FROM produtos";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    } catch (Exception $erro) {
        die ("Erro: ".$erro->getMessage());
    }
    return $resultado;
};


function inserirProduto(PDO $conexao, string $nome, string $descricao, int $preco, int $quantidade):void {
    $sql = "INSERT INTO produtos(nome, descricao, preco, quantidade, fabricante_id) VALUES(:nome, :descricao, :preco, :quantidade)";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $preco, PDO::PARAM_INT);
        $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);

        $consulta->execute();

    } catch (Exception $erro) {
        die ("Erro: ".$erro->getMessage());
    }
};


