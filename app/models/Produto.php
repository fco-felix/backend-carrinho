<?php
namespace App\Models;

class Produto {

    private string $codigo;
    private string $descricao;
    private float $preco;
    private $imagem;

    public function __construct($codigo, $descricao, $preco) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getImagem()
    {
        return $this->imagem;
    }
    
}