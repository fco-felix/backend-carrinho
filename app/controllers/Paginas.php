<?php

namespace App\Controllers;

use App\Controllers\ControladorCore;
use App\Models\Produto;
use App\Models\BD\ProdutoDao;

class Paginas extends ControladorCore
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $pDao = new ProdutoDao();
        $produtos = $pDao->getProdutos();
        $this->addDadosPagina(
            "produtos",
            $produtos
        );
        $this->addTituloPagina("Página Inicial");
        $this->carregarPagina("v_home");
    }

    public function produto($codigo)
    {
        $pDao = new ProdutoDao();
        $produto = $pDao->getProduto($codigo);

        $this->addTituloPagina("Página Produto");
        $this->addDadosPagina("codigo", $produto["codigo"]);
        $this->addDadosPagina("descricao", $produto["descricao"]);
        $this->addDadosPagina("preco", $produto["preco"]);
        $this->carregarPagina("v_produto");
    }

    public function carrinho()
    {
        $valorTotal = 0;
        if (isset($_SESSION['produtos_carrinho'])) {
            foreach ($_SESSION['produtos_carrinho'] as $produto) {
                $valorTotal += $produto["preco"];
            }
        }
        $this->addDadosPagina("valor_total_carrinho", $valorTotal);
        $this->addTituloPagina("Página Carrinho");
        $this->carregarPagina("v_carrinho");
    }

    public function addcarrinho($codigo)
    {
        $pDao = new ProdutoDao();
        $produto = $pDao->getProduto($codigo);
        if (!isset($_SESSION['produtos_carrinho'])) {
            $_SESSION['produtos_carrinho'] = array();
        }
        array_push($_SESSION['produtos_carrinho'], $produto);

        if (isset($_SESSION["itens_carrinho"])) {
            $_SESSION["itens_carrinho"] += +1;
        } else {
            $_SESSION["itens_carrinho"]  = 1;
        }
        $this->carrinho();
    }

    public function entrar()
    {
        if (!empty($_SESSION["erro_autenticacao"])) {
            $erro_login = $_SESSION["erro_autenticacao"];
            unset($_SESSION["erro_autenticacao"]);
            $this->addDadosPagina("erro_autenticacao", $erro_login);
        }
        $this->addTituloPagina("Login Usuário");
        $this->carregarPagina("v_login");
    }

    public function sobre()
    {
        echo __FUNCTION__;
    }

    public function erro404($segmento)
    {
        $this->addTituloPagina("Não encontrada (404)");
        $this->addDadosPagina("segmento", $segmento);
        $this->carregarPagina("erro404");
    }
}
