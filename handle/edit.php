<?php
//id , submit

require_once '../inc/connection.php';
require_once '../App.php';


if($request->checkGet('id')&& $request->checkPost("submit")){

    $id =$request->get("id");

    $title =$request->clean($request->post("title"));


//validation

$validation->validate("title",$title,["Required","str"]);
$errors=$validation->getError();

if(empty($errors)){
    //update
    $stm =$conn->prepare("update  todo set `title`=:title where id=:id");
    $stm->bindParam(":title",$title,PDO::PARAM_STR);
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $output =$stm->execute();
    if($output){
        $session->set("success","Data updated Successfuly");
        $request->header("../index.php");
    }
    else{
        $session->set("errors",["error"]);
        $request->header("../edit.php?id=$id");
    
    }

}else{
    $session->set("errors",$errors);
    $request->header("../edit.php?id=$id");

}
}else{
    $request->header("../index.php");
}