<?php
require_once "conecta.php";

// Ler os dados dos fabricantes
function lerFabricantes(PDO $conexao):array {
     // String com o comando SQL
     $sql = "SELECT id, nome FROM fabricantes";
     try {
     // Preparação do comando
    $consulta = $conexao->prepare($sql);
    // execução do comando
    $consulta->execute();
     // Capturar os resultados
     $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC); // Transforma em array associativo o resultado bruto do banco de dados
     } catch (exception $erro) {
         die ("Erro: ".$erro->getMessage());
     }
     return $resultado;
};

// Inserir um fabricante
function inserirFabricante(PDO $conexao, string $nome):void  {
    // :qualquercoisa named parâmeters
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
    try {
        $consulta = $conexao->prepare($sql);
        // bindParam("nome do paramtero, $variável, constante de verificação")
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: " .$erro->getMessage());
    }

};

function lerUmFabricante(PDO $conexao, int $id):array {
    $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch (PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}

function atualizarFabricante(PDO $conexao, int $id, string $nome):void {
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}

function excluirFabricante (PDO $conexao, int $id):void {
    $sql = "DELETE FROM fabricantes WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}

