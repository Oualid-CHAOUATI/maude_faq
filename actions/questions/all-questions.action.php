<?php
require "./actions/db.php";



try{

    
    //pas de question specifique ? => chercher toutes les questions 
if(!isset($_GET["search"]))
{
$getAllReq=$bdd->query("select * from questions  ORDER  BY id DESC LIMIT 5");

return;
}


$search=$_GET["search"];
if(empty($search))return;

// peu importe + notre_recherche + peu importe 
$getAllReq=$bdd->query("select * from questions where title like '%$search%' ORDER  BY id DESC");
}catch(Exception $e){

    die($e);
}

