<?php

declare(encoding='UTF-8');

namespace Generator;

class Data{
    const MAX_LENGTH = 30;
    private $data = array();
    private $variables = array();
    private $seeder = null;
    public function __construct($vars,$seeder){
        $this->variables = $vars;
        $this->seeder = $seeder;
    }
    public function __set($name,$value){
        $this->data[$name] = $value;
    }
    public function __get($name){
        return $this->data[$name];
    }

    public function feed(){
        foreach($this->variables as $var){
            $this->data[$var] = $this->seeder->seed(mt_rand(10,self::MAX_LENGTH));
        }
        return $this->data;
    }
}
