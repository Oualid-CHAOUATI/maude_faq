<?php
require("./actions/db.php");




try{
$errorMessage="nada error ";

    
    $author_ID=$_SESSION["id"];
    $getQuestionsRequest=$bdd->prepare("Select * from questions where author_ID = ? ORDER BY id DESC");
    $getQuestionsRequest->execute([$author_ID]);

}catch(Exception $exception){
die($exception);
}




