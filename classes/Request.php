<?php
namespace Route\week13\Todo\classes;

class Request{


    public function get($key){
        return(isset($_GET[$key]))?$_GET[$key]: "Key not correct ";
 
}

public function post($key){
    return(isset($_POST[$key]))?$_POST[$key]: "Key not correct ";

}

public function checkPost($key){
    return isset($_POST[$key]);



}
public function checkGet($key){
    return isset($_GET[$key]);

}
public function clean($key){
    return trim(htmlspecialchars($key));
}

public function header($file){
return header("location:$file");
}
}
?>