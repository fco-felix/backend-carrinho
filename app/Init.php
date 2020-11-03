<?php
namespace App;

use App\Controllers\Paginas;
use App\Controllers\Autenticacao;
/**
 * (Singleton) Interceptador que direcionará requisições para os controladores
 * adequados de acordo com as rotas definidas.
 */
class Init {
    
    private static $init;
    private $rotas;
    
    private function __construct(array $rotas) {
        $this->rotas = $rotas;        
        $this->processarRota($this->getSegmentosDaUrl());
        
    }
    
    public static function getInstancia(array $rotas): Init {
        if (!isset(self::$init)) {
            self::$init = new Init($rotas);
        }
        return self::$init;
    }

    /**
     * Pega o endereço URL da requisição recebida no servidor.
     */
    private function getSegmentosDaUrl(): string {
        // Pega os seguimentos da url
        $segmentosDaUrl = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        
        // Divide a url em um array para que fique mais prático tratar o encaminhamento da rota
        $segmentos = explode("/", $segmentosDaUrl);
        
        // Remove elementos vazios da url
        foreach ($segmentos as $key => $s) {
            if (empty($s)) {
                unset($segmentos[$key]);
            }
        }

        // Limpa a URL removendo o nome do site dos segmentos lidos. deverá estar na primeira posição do array
        array_shift($segmentos);
        
        // Retorna os segmentos tratados
        $temp = implode("/", $segmentos);

        return $temp;
    }
    
    /**
     * Realiza o mapeamento da rota para uma classe controller
     */
    private function processarRota(string $url) {
        foreach ($this->rotas as $rota) {
            if ("/$url" == $rota["rota"]) {
                $nameClass = $rota["controller"];
                $controller = new $nameClass;
                
                if (method_exists($controller, $rota["funcao"])) {
                    $funcao = $rota["funcao"];
                    $controller->$funcao();
                    
                    $controllerExiste = true;
                    break;
                }
            }
        }
        if (empty($controllerExiste)) {
            $this->lancar404($url);
        }
    }
    
    private function lancar404($url) {
        (new Paginas())->erro404($url);
    }
    
    public function getRotas() {
        return $this->rotas;
    }
}