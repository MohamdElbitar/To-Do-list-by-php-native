<?php

namespace Route\week13\Todo\classes\Validation;

require_once 'Validator.php';
use Route\week13\Todo\classes\Validation\Validator;


class Required implements Validator{
    public function check($key,$value){

        if(empty($value)){
            return "$key is required ";
        }else{
            return false;
        }
    }
}

?>