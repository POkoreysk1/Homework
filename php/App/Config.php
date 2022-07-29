<?php

namespace App;

class Config
{
    protected array $data;

    public function __construct()
    {
        foreach((include __DIR__ . '/../config.php')['db'] as $key => $value){
            $this->data[$key] = $value;
        }
    }

    public function getConfigData(): array
    {
        return $this->data;
    }

}
