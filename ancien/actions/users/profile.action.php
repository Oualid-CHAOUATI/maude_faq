<?php
require "actions/db.php";




$user_ID=$_SESSION["id"];

if(!isset($user_ID) || empty($user_ID)){
    echo("not logged in ");
    return;
}

$getUser_req=$bdd->prepare("select * from users where id = ? ");
$getUser_req->execute([$user_ID]);

if($getUser_req->rowCount()==0){
    echo("user id  not found in DB ");
    return;
}


$userInfo=$getUser_req->fetch();

$user_pseudo=$userInfo["pseudo"];
$user_last_name=$userInfo["last_name"];
$user_first_name=$userInfo["first_name"];

$questions_req=$bdd->prepare("SELECT count(*) as total_number from questions where author_ID = ?");
$questions_req->execute([$user_ID]);


$user_questions_number=$questions_req->fetch();
$user_questions_number= $user_questions_number["total_number"];





