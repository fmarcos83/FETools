<?php

declare(encoding='UTF-8');

namespace Seeder;

class Alpha{
    const ini=0x41;
    const offset=0x7a;

    static function seed($len){
        $str = '';
        while($len>0){
            $len-=1;
            $str.=chr(mt_rand(self::ini,self::offset));
        }
        return $str;
    }
}
