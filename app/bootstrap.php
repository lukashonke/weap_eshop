<?php
namespace app;

class Bootstrap
{
    private $controller;
    private $action;
    private $params = array();

    function __construct()
    {
        $this->splitUrl();
        $this->routeRequest();
    }

    function splitUrl()
    {
        if(isset($_GET['url']))
        {
            $url = $_GET['url'];
            $url = str_replace("_", "", $url);
            $url = rtrim($url, '/'); // da do haje posledni lomitko
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);

            if(isset($url[0]))
                $this->controller = $url[0];
            else
                $this->controller = null;

            if(isset($url[1]))
                $this->action = $url[1];
            else
                null;

            $this->params = array_slice($url, 2);
        }
    }

    function routeRequest()
    {
        if($this->controller)
        {
            $class_name = "\\app\\classes\\controllers\\" .$this->controller . "controller";
            $class_file = "app/classes/controllers/" .$this->controller."controller.php";

            if(is_readable($class_file))
            {
                $handler = new $class_name();
                if($this->action && method_exists($handler, $this->action))
                {
                    $handler->{$this->action}($this->params);
                    return true;
                }
                elseif(!$this->action)
                {
                    $handler->index();
                    return true;
                }
                else
                {
                    $handler = new classes\controllers\ErrorController();
                }
            }
            else
            {
                $handler = new classes\controllers\ErrorController();
            }
        }
        else
        {
            $handler = new classes\controllers\HomeController();
            //$handler = new classes\controllers\AdminHomeController();
            /*include('template.html');
            //header("template.html");
            //header("Connection: close");
            return;*/
        }

        $handler->index();
    }
}