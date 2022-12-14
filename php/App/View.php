<?php

namespace App;



class View
{
    protected $data = [];

    public function display($template)
    {
        echo $this->render($template);
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    function __isset($name)
    {
        return isset($this->data[$name]);
    }
}