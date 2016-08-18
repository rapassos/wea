<?php

namespace Wea\Layout;

class Layout {

    private $header;
    private $footer;
    private $layoutPath;
    private $contents;

    public function __construct($layout = null) {
        $this->setLayout($layout);
    }

    public function setLayout($layout = null) {
        include 'config/layouts.php';
        $lay = is_null($layout) ? 'default' : $layout;
        $lay = isset($layouts[$lay]) ? $lay : 'default';
        $this->header = $layouts[$lay]['header'];
        $this->footer = $layouts[$lay]['footer'];
    }

    public function getHeader() {
        return $this->header;
    }

    public function getFooter() {
        return $this->footer;
    }

    public function getContents() {
        return $this->contents;
    }

    public function get_include_contents($filename) {
        if (is_file($filename)) {
            ob_start();
            include $filename;
            return ob_get_clean();
        }
        return false;
    }

    public function loadLayout($page) {
        require_once $page['layout'];
        $this->contents = $this->get_include_contents(APPLICATION_PATH . '/' . $page['caminho']);
    }

}
