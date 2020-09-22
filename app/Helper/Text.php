<?php

namespace App\Helper;

trait Text {

    /**
     * snake_case => snakeCase
     */
    function snakeToCamelCase($string, $capitalizeFirstCharacter = false) 
    {
        $str = str_replace('_', '', ucwords($string, '_'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }


    /**
     * camelCase => snake_case
     */
    function camelToSnakeCase($string, $capitalizeFirstCharacter = false) 
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
        $ret = $matches[0];
     
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
     
        $str = implode('_', $ret);

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }

}