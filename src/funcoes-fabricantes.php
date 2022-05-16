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
         die ("Erro: ".$erro->getMassage());
     }
     return $resultado;
}