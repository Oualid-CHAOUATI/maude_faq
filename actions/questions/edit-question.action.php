<?php
require "actions/db.php";


//?verifier si un parametre id a étét passé  dans l'url 
$paramID=$_GET["id"];
if(!isset($paramID)){
    $errorMessage="aucun identifiant de  question n'a été trouvé ";
    return;
}

try{
    //?selectionner la question dont l'id ets passé dans l'url 
    $getQuestionRequest=$bdd->prepare("select * from questions where id = ?");
    $getQuestionRequest->execute([$paramID]);
    //?elle existe ?
    if($getQuestionRequest->rowCount()>0){
        //?recupérer les informations de la quetion
        $questionInfo = $getQuestionRequest->fetch();
        $author_ID=$questionInfo["author_ID"];

        //?check auhtor_id with the session user id  otherwise ,, error message i UI + quit 
        $sessionUser_ID=$_SESSION["id"];
        if($author_ID!=$sessionUser_ID){
         $errorMessage="you're not the owner of the question    ";
        return;
        }


        //?récuperer les infos de la qsion en variables afin de pré-remplir le formularie
        $title=trim($questionInfo["title"]);
        $description= trim($questionInfo["description"]);
        $content=trim(str_replace("<br />","",$questionInfo["content"]));
        // $publication_date=$questionInfo["publication_date"];

        $errorMessage="please modify the fields then submit";

    }
    else{
        $errorMessage="question not in DB";
    }
}catch(Exception $e){
    die($e);
}

