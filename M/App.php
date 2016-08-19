<?php

namespace wea\M;

class App {
    
    private static $instance;


    private $setup;
    private $controller;
    private $view;
    
    
    
    
    protected $config;
    public $roteador;
    public $layout;

    private function __construct() {
        
    }
    
    public function load($setup){
        $this->setup = \wea\M\Setup::getInstance();
        $this->setup->loadConfig($setup);
        
        
        $this->config = new \wea\M\Config();
        $this->roteador = new \wea\C\Roteador();
        $this->layout = new \wea\V\Layout();
    }
    
    public function getConfig(){
        return $this->config;
    }

    public function getRoteador(){
        return $this->roteador;
    }
    
    public function Run(){
        $this->layout->loadLayout($this->roteador->getPagina());
        //$pagina = $this->roteador->getPagina();
        //echo $pagina['caminho'];
        //echo 'XXXXXXXXXXXXXXXXX';
        //echo $this->layout->getContents($pagina['caminho']);
        //require_once $pagina['caminho'];
    }
    
    public static function getInstance() {
         if (!isset(self::$instance)) {
             self::$instance = new App();
         }
        return self::$instance;
    }
}
