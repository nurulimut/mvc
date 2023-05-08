<?php

class App {
    protected $Controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() 
    {
      $url = $this->parseURL();

    // controller
    if(@file_exists('../app/controllers/' . $url[0] . '.php') )  {
       $this->Controller = $url[0];
       unset($url[0]);
    }
    require_once '../app/controllers/' . $this->Controller . '.php';  
    $this->Controller = new $this->Controller; 


    // method
    if( isset($url[1])) {
        if(method_exists($this->Controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
    }

    // params
    if( !empty($url) ) {
        $this->params = array_values($url);
    }

    // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->Controller, $this->method], $this->params);

    }

    public function parseURL()
    {
        if( ISSET($_GET['url'])) {
            $url = rtrim ($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    
    }
}