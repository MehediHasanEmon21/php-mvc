<?php

namespace App;

use Exception;

class View {

    public function __construct(
        public string $view, 
        public array $params = [])
    {
        $this->render();
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    } 

    public function render()
    {   
        if(count($this->params) > 0){
            extract($this->params);
        }
        
        $viewName = VIEW_PATH . $this->view . '.php';

        if(!file_exists($viewName)){
            throw new Exception('View Not Found');
        }
        
        return include $viewName;

       
    }

    

}