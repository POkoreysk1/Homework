<?php

namespace App;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    protected $view;
    protected Environment $twig;


    public function __construct()
    {
        $this->view = new View();
        $this->twig = new Environment(new FilesystemLoader('templates'));

    }
    public function getTwig(): Environment
    {
        return $this->twig;
    }
    protected function acces() :bool
    {
        return true;
    }
    abstract protected function handle();

     public function __invoke()
     {
         if ($this->acces()){
             $this->handle();
         }else die('нет доступа');
     }

}