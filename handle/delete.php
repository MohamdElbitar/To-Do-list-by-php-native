<?php

require_once '../inc/connection.php';
require_once '../App.php';



//submit
if($request->checkGet("id")){
$id=$request->get('id');
$stm =$conn->prepare("select id  from todo where id=:id");
$stm->bindParam(":id",$id,PDO::PARAM_INT);
$stm->execute();
if($stm->rowCount()>0){
    $stm = $conn->prepare("delete from todo where id=:id");
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $output =$stm->execute();
    if($output){
        $session->set("success","note Deleted Successfuly");
        $request->header("../index.php");
    }
    else{
        $session->set("errors",["not found"]);
        $request->header("../edit.php?id=$id");
    
    }

}else{
    $session->set("errors",["not found"]);
    $request->header("../index.php");

}
}
else{
    $session->set("errors",["not found"]);
    $request->header("../index.php");

}