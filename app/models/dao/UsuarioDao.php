<?php
namespace App\Models\BD;

use App\Models\Usuario;
use PDO;

class UsuarioDao extends Dao {

    public function __construct() {
        parent::__construct();
    }

    public function login($nome, $senha) {
        try {
            $sql = "SELECT * FROM tb_usuario WHERE nome = ? AND senha = ?";

            $req = $this->pdo->prepare($sql);
            $req->execute([$nome, $senha]);

            $resultado = $req->fetch(PDO::FETCH_ASSOC);

            if (!empty($resultado)) {
                return new Usuario($resultado["nome"], $resultado["email"], $resultado["senha"]);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        return null;
    }
}