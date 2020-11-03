<?php
namespace App\Models\BD;

use PDO;
use function App\Config\getConexaoBD;

abstract class Dao {

    protected $pdo;

    public function __construct() {
        $this->pdo = getConexaoBD();
    }
}