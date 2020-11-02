<?php
namespace App\Controllers;

use App\Controllers\ControladorCore;

class Paginas extends ControladorCore {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->addTituloPagina("Página Inicial");
        $this->carregarPagina("v_home");
    }

    public function carrinho() {
        $this->addTituloPagina("Página Carrinho");
        $this->carregarPagina("v_carrinho");
    }

    public function produtos() {
        if (!$this->estaLogado()) {
            header("Location:".BASE_URL);
        } else {
            $this->addTituloPagina("Listar Produtos");
            
            $this->addDadosPagina(
                "produtos",
                array("Monitor", "Placa mãe", "Memória RAM")
            );

            $this->carregarPagina("produtos");
        }
    }
    
    public function entrar() {
        if (!empty($_SESSION["erro_autenticacao"])) {
            $erro_login = $_SESSION["erro_autenticacao"];
            unset($_SESSION["erro_autenticacao"]);
            $this->addDadosPagina("erroLogin", $erro_login);
        }
        $this->addTituloPagina("Login Usuário");
        $this->carregarPagina("v_login");
    }

    public function sobre() {
        echo __FUNCTION__;
    }

    public function erro404($segmento) {
        $this->addTituloPagina("Não encontrada (404)");
        $this->addDadosPagina("segmento",$segmento);
        $this->carregarPagina("erro404");
    }
}
