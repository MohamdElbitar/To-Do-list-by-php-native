<?php


require_once '../inc/connection.php';
require_once '../App.php';



//submit
if($request->checkPost("submit")){
//catch

    $title = $request->clean($request->post("title"));

//validation

$validation->validate("title",$title,["Required","str"]);
$errors=$validation->getError();
// var_dump($errors);

if(empty($errors)){
    //insert

    $stm =$conn->prepare("insert into todo (`title`) values(:title)");
    $stm->bindParam(":title",$title,PDO::PARAM_STR);
    $output =$stm->execute();
    if($output){
        $session->set("success","Data inserted Successfuly");
        $request->header("../index.php");
        //index , session
    } else{$session->set("errors",$errors);
          $request->header("../index.php");}
}else{
    $session->set("errors",$errors);
    $request->header("../index.php");
    //index , session
}

}else{
    //redirect index
    $request->header("../index.php");
}


//insert 
//return errors

