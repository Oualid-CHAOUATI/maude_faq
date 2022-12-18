<?php

$hostname='host=localhost';
$databaseName='biblio';
$user='root';
$psw='';



try{
    session_start();

    $pdo=new PDO("mysql:$hostname;dbname=$databaseName;charset=utf8;",$user,$psw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(Exception $exception){
    die('une erreur est survenu au lancement de la database '.$exception->getMessage());
    // $pdo=null;

}
