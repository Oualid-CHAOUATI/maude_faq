<?php
require "actions/db.php";

$getCommentsReq=$bdd->prepare("SELECT u.pseudo AS pseudo,c.content AS content FROM users u ,comments c WHERE u.id=c.author_ID AND c.question_ID=?");
$getCommentsReq->execute([$paramQuestion_ID]);

if($getCommentsReq->rowCount()==0);
else{
$comments=$getCommentsReq;
}
// $comments=$getCommentsReq->exec
if(!isset($_POST["send-comment"]))
{
    echo "didnt clickd on btn";
    return;
}

if(!isset($_POST["comment-content"])||empty($_POST["comment-content"])) 
{
    echo "comment is empty ";    
    return;
}
$commentContent =$_POST["comment-content"];
$author_ID=$_SESSION["id"];

//! pour recupérer apartir de l'url mais ,, comme ce fichier sera inclu dans le quesion-content.php , le fichier meme contient une varible id ( id de la quetion )
//! in peut acceder à l'id de la ques tion directement depuis cette variable accessible d'ici
// $question_ID= $_GET["id"];



try{

    //?$paramQuestion_ID
    $commentReq= $bdd->prepare("INSERT INTO comments(author_ID,question_ID,content)VALUES(?,?,?);");
    $commentReq->execute([$author_ID,$paramQuestion_ID,$commentContent]);    
}catch(Exception $e){

    die($e);
}
