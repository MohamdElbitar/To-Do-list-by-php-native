<?php
//id , submit

require_once '../inc/connection.php';
require_once '../App.php';


if($request->checkGet('id')&& $request->checkGet("name")){

    $id =$request->get("id");
    $status =$request->get("name");

    $stm =$conn->prepare("select id  from todo where id=:id");
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
   $stm->execute();
    if($stm->rowCount()>0){
         //update
    $stm =$conn->prepare("update  todo set `status`=:status where id=:id");
    $stm->bindParam(":status",$status,PDO::PARAM_STR);
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $output =$stm->execute();

    if($output){
        $session->set("success","status updated Successfuly");
        $request->header("../index.php");
    }
    else{
        $session->set("errors",["error"]);
        $request->header("../edit.php?id=$id");
    
    }
    } else{
        $session->set("errors",["not found"]);
        $request->header("../index.php");
    
    }

   


}else{
    $request->header("../index.php");
}