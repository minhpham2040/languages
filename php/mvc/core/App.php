<?php
class App
{
    public $controller = "Home";
    public $action = 'index';
    public $params = [];

    function __construct()
    {
        $url = $this->urlProcess();

        if (isset($url[0])) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        if (isset($url[1])) {
            $this->action = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        require_once "./mvc/controllers/" . $this->controller . ".php";

        call_user_func_array([new $this->controller, $this->action], $this->params);
    }

    function urlProcess()
    {
        if (isset($_SERVER['PATH_INFO'])) {
            $pathInfo = $_SERVER['PATH_INFO'];
            $arrUrl = array_filter(explode('/', $pathInfo)); //filter: null, false, '', 0, '0'
            $url = array_values($arrUrl);
            return $url;
        } else {
            return [];
        }
    }
}
