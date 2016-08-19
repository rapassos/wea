<?php

namespace wea\M;

class Setup {

    private static $instance;

    private function __construct() {
        
    }

    public function loadConfig($setup = null) {
        //...
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Setup();
        }
        return self::$instance;
    }

}
