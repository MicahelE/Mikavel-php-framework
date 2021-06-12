<?php
/* 
* App Core Class
* Creates URL &  loads core controller
/controller/method/params
*/
Class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url =  $this->getUrl();
        // Look in controllers for first value
        if (file_exists('../app/controllers/' . ucwords($) )) {
            # code...
        }
    }

    public function getUrl()
    {
       if(isset( $_GET['url'])){
       $url=rtrim( $_GET['url'], '/');
       $url= filter_var($url, FILTER_SANITIZE_URL);
       $url = explode('/', $url);
       return $url;
    }
    }
}