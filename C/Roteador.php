<?php

namespace wea\C;

//use wea\AnalisadorRequisicao;
//require_once 'Wea/AnalisadorRequisicao.php';

class Roteador{
    
    public $analisadorRequisicao;
    public $roteador;
    private $pagina;


    public function __construct($arqPaginas = NULL) {
        $this->setArqPaginas($arqPaginas);
        $this->analisadorRequisicao = new \wea\M\AnalisadorRequisicao();
    }
    
    private function setArqPaginas($arqPaginas = NULL){
        if(!is_null($arqPaginas)){
            include_once $arqPaginas;
            $this->roteador['paginas'] = $paginas;
        }
    }
    
    private function setPagina(){
        $requisicao = $this->analisadorRequisicao->getRequisicao();
        if(isset($this->roteador['paginas'][$requisicao])){
            $this->pagina = $this->roteador['paginas'][$requisicao];
        }else{
            $this->pagina = $this->roteador['paginas']['erro'];
        }
        
    }

    public function getPagina(){
        $this->setPagina();
        return $this->pagina;
    }
}
