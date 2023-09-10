<?php

namespace Route\week13\Todo\classes\Validation;

interface Validator{
    public function check($key ,$value);
}