<?php
namespace App\Models\BD;

use PDO;
use Exception;

class ConfigConexaoBD {

    private static $configConexaoBD;
    private $conexao;

    private function __construct($host, $nome, $usuario, $senha) {

        try {
            $this->conexao = new PDO(
                "mysql:host=$host;dbname=$nome;charset=utf8",
                $usuario,
                $senha
            );

            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstancia($host, $nome, $usuario, $senha) {
        if (empty(self::$configConexaoBD)) {
            self::$configConexaoBD = new ConfigConexaoBD($host, $nome, $usuario, $senha);
        }
        return self::$configConexaoBD;
    }

    public function getConexao() {
        return $this->conexao;
    }
}