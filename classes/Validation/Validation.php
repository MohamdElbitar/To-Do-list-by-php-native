<?php
namespace Route\week13\Todo\classes\Validation;
require_once 'Required.php';
require_once 'Str.php';


class Validation{
    private $errors =[];
     public function validate($key,$value,$rules){

        foreach ($rules as $rule){

            $rule = "Route\week13\Todo\classes\Validation\\".$rule;
            $object = new $rule;
          $error=  $object->check($key,$value);

          if ($error != false){
            $this->errors[] =$error;
          }
        }
     }

     public function getError(){
        return $this->errors;
     }
}