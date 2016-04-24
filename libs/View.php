<?php
namespace libs;

class View
{
    protected $_file;
    protected $_data = array();

    public function __construct($viewname, $isTemplate = false, array $data = NULL)
    {
        if(!$isTemplate)
            $this->_file = "app/views/". $viewname . ".php";
        else
            $this->_file = "app/template/". $viewname . ".php";

        if($data !== NULL)
        {
            array_merge($data, $this->_data);
        }
    }

    public function render()
    {
        extract($this->_data);

        ob_start();

        try
        {
            require_once $this->_file;
        }
        catch (Exception $e)
        {
            ob_end_clean(); // smazat buffer
            throw $e; // vyhodit vys
        }

        return ob_get_clean();
    }

    public function __set($key, $value)
    {
        $this->set($key, $value);
    }

    public function set($key, $value = NULL)
    {
        $this->_data[$key] = $value;
        return $this;
    }
}