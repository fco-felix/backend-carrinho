<?php

namespace App\Models\BD;

use App\Models\Produto;
use Exception;
use PDO;

class ProdutoDao extends Dao
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getProdutos()
  {
    try {
      //$sql = "SELECT * FROM tb_produto";

      //$req = $this->pdo->prepare($sql);
      $req = $this->pdo->prepare("SELECT codigo, descricao, preco, foto FROM tb_produto");
      $req->execute();

      $resultado = $req->fetchAll(PDO::FETCH_CLASS, "App\Models\Produto");

      if (!empty($resultado)) {
        return $resultado;
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }

    return null;
  }

  public function getProduto($codigo)
  {
    try {
        $sql = "SELECT * FROM tb_produto WHERE codigo = ?";

        $req = $this->pdo->prepare($sql);
        $req->execute([$codigo]);

        $resultado = $req->fetchAll(PDO::FETCH_CLASS);

        if (!empty($resultado)) {
            return $resultado;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return null;
  }

}
