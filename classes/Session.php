<?php
namespace Route\week13\Todo\classes;

class Session{

    public function __construct(){
        session_start();
    }

    //set
public  function set($key,$value){
    $_SESSION[$key] = $value;
}
    //get
    public function get($key){

        return(isset($_SESSION[$key]))? $_SESSION[$key]: "Key not correct ";
    }
    //remove
public function remove($key){
    unset($_SESSION[$key]);
}
    //destroy

    public function destroy(){
        session_destroy();
    }

    public function check($key){
        return isset($_SESSION[$key]);
    }
}

?>