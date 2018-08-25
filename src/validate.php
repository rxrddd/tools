<?php

namespace Tool;
class Validate
{
    static function isNumber($val){
        return is_numeric($val);
    }
    static function isString(){

    }
    static function isArray($val){
        return is_array($val);
    }
    static function isFloat(){

    }
    static function isTel($val){
        if (self::isNumber($val))return false;
        return preg_match("/^1[345678]{1}\d{9}$/",$val);
    }
    static function isIdCard($val){

    }
}