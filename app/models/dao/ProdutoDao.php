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
      $sql = "SELECT * FROM tb_produto";

      $req = $this->pdo->prepare($sql);
      $req->execute();

      $resultado = $req->fetch(PDO::FETCH_ASSOC);

      if (!empty($resultado)) {
        return new Produto($resultado["codigo"], $resultado["descricao"], $resultado["preco"]);
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }

    return null;
  }
}
