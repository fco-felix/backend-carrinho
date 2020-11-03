<?php

namespace App\Models;

class Produto
{
    private string $codigo;
    private string $descricao;
    private float $preco;
    private $foto;

    //Comentado para que o fetch do ProdutoDao consiga chamar o construtor padrão e setar os valores
    /*function __construct($codigo, $descricao, $preco, $foto)
    {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->foto = $foto;
    }*/

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

    public function getFoto()
    {
        return $this->foto;
    }
}
