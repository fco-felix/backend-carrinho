<?php

namespace App\Controllers;

use App\Controllers\ControladorCore;
use App\Models\Usuario;
use App\Models\BD\UsuarioDao;

class Autenticacao extends ControladorCore
{

    public function login()
    {
        if ($this->estaLogado()) {
            header("Location:" . BASE_URL . "\logado");
        } else {
            $nomeUsuario = $_POST["nome"] ?? null;
            $senha = $_POST["senha"] ?? null;

            if (!empty($nomeUsuario) && !empty($senha)) {
                $uDAO = new UsuarioDao();
                $usuario = $uDAO->login($nomeUsuario, $senha);

                if (!empty($usuario)) {
                    $this->logarUsuario($usuario);
                    header("Location: " . BASE_URL . "\logado");
                    return;
                } else {
                    $_SESSION["erro_autenticacao"] = "Login incorreto";
                }
            } else {
                $_SESSION["erro_autenticacao"] = "Informe todos os dados";
            }
            header("Location: " . BASE_URL . "/entrar");
        }
    }

    public function logout()
    {
        $this->deslogarUsuario();
        header("Location:" . BASE_URL . "\deslogou");
    }
}
