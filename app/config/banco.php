<?php
namespace App\Config;

use PDO;
use App\Models\BD\ConfigConexaoBD;

function getConexaoBD(): PDO {
    $conn = ConfigConexaoBD::getInstancia(
        "localhost",
        "banco_pdsiii",
        "root",
        ""//"root"
    );
    
    return $conn->getConexao();
}