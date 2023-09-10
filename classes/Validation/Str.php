<?php

namespace Route\week13\Todo\classes\Validation;
require_once 'Validator.php';
use Route\week13\Todo\classes\Validation\Validator;


class Str implements Validator{
    public function check($key,$value){

        
        if(is_numeric($value)){
            return "$key is must be string ";
        }else{
            return false;
        }
    
    }
}

?>