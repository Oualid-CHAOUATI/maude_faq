<?php
require "./actions/db.php";




//parametre pas fourni ?
if(!$_GET["id"]){
    echo("no id provided in url");
    return;
}

//parametre vide  ?

$paramQuestion_ID=$_GET["id"];

if(empty($paramQuestion_ID)){
    echo "id vide";
    return;
}

try{

    $questionReq=$bdd->prepare("SELECT * FROM questions WHERE id = ?");
    $questionReq->execute([$paramQuestion_ID]);
    
    //question existe pas?
    if($questionReq->rowCount()==0){
        echo "no correspondong question i ndatabase";
        return;
    }

    //? les inof de la question dont l'id = id en param
    $questionInfo=$questionReq->fetch();
    $title=$questionInfo["title"];
    $description=$questionInfo["description"];
    $content=$questionInfo["content"];
    $publication_date=$questionInfo["publication_date"];
    $author_ID=$questionInfo["author_ID"];



    echo $description;
    //? recuperer l'auteur de la question dans la  table users
    $userReq= $bdd->prepare("SELECT pseudo from users where id = ?");
    $userReq->execute([$author_ID]);

    //?auteur inexistant ? 
    if($userReq->rowCount()==0){
        echo " author not find in DB";
        return;
    }
      
    $userReq_Response=$userReq->fetch();
    $pseudo=$userReq_Response["pseudo"];





}

catch(Exception $e)
{
    die($e);
}


