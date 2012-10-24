<?php

declare(encoding='UTF-8');

namespace Tools\Generator;

class Data{
    const MAX_LENGTH = 30;
    private $data = array();
    private $variables = array();
    private $seeder = null;
    public function __construct(array $vars, $seeder){
        $this->variables = $vars;
        $this->seeder = $seeder;
    }

    public function __set($name, $value)
    {
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
    public function generate($root, $num)
    {
        $result = array();
        $result['count'] = $num;
        while ($num > 0) {
            $result[$root][] = $this->feed();
            --$num;
        }
        return $result;
    }
}
