<?php

class App
{
    protected $controller = 'jobs'; 
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->urlPars();
        //CONTROLLER url[0] , Set default controller if it don't exists
        //check if file exists
        if(isset($url[0]) && file_exists('../app/controllers/'. $url[0] .'Controller.php')){
            $this->controller = $url[0].'Controller';
            //cleaunsetr is important 
            unset($url[0]);
        }else{
            $this->controller = $this->controller.'Controller';
        }
        require_once "../app/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;
        //METHOD url[1], Set default method if it don't exists
        //check if method exists in that controller
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                //cleaunsetr is important 
                unset($url[1]);
            }
        }
        //URL PARAMS
        //check if url has parmas
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function urlPars()
    {
        if(isset($_GET['url'])){
            // sanitize url trim /
            $rtrim = rtrim($_GET['url'], '/');
            $filter = filter_var($rtrim, FILTER_SANITIZE_URL);
            // make array of params 
            $url = explode('/', $filter);
            return $url;
        }
    }
}

?>