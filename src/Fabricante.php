<?php
namespace CrudPoo;
use PDO;
use Exception;

final class Fabricante {
    private int $id;
    private string $nome;

    /* Esta propriedade receberá os recursos PDO através da classe Banco
    (dependência do projeto) */
        private PDO $conexao;

        public function __construct()
        {
            $this->conexao = Banco::conecta();
        }

        public function lerFabricantes():array {
            // String com o comando SQL
            $sql = "SELECT id, nome FROM fabricantes";
            try {
            // Preparação do comando
           $consulta = $this->conexao->prepare($sql);
           // execução do comando
           $consulta->execute();
            // Capturar os resultados
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC); // Transforma em array associativo o resultado bruto do banco de dados
            } catch (exception $erro) {
                die ("Erro: ".$erro->getMessage());
            }
            return $resultado;
       }

       function inserirFabricante():void  {
        // :qualquercoisa named parâmeters
        $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
        try {
            $consulta = $this->conexao->prepare($sql);
            // bindParam("nome do paramtero, $variável, constante de verificação")
            $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }
    
    }









    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;

    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);

    }
}