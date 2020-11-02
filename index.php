<?php
// Navegador -> index.php -> ConfRotas -> Controller -> Models -> (caminho reverso)
session_start();
error_reporting(E_ALL);

require_once "vendor/autoload.php";
require_once dirname(__FILE__)."/app/config/constantes.php";
require_once PATH_APP."/config/rotas.php";
require_once PATH_APP."/config/banco.php";

use App\Init;

Init::getInstancia($rotas);