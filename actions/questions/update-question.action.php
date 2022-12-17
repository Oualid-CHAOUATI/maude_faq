<?php
require "actions/db.php";

if(isset($_POST["submit"])){

    $errorMessageBase="veuillez reneinger le ";
    $allFieldsAreSet=true;

    //? verifier si les champs sont remplis
    
    if(empty($_POST["title"]))
    {
        $errorMessageTitle=$errorMessageBase." le titre ";
        $allFieldsAreSet=false;
    }
  
    if(empty($_POST["description"]))
    {
        $errorMessageDescription=$errorMessageBase." la description";
        $allFieldsAreSet=false;
    }
    if(empty(trim($_POST["content"])))
    {
        $errorMessageContent=$errorMessageBase." le content ";
        $allFieldsAreSet=false;
    }

    //si tout est rempli
    if($allFieldsAreSet){
        //recuperer le titre, description, et content 
        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);
        $content = 
        nl2br(htmlspecialchars($_POST["content"]));
         $date = date("d/m/y");

 
         try{
 
             $newQuestionRequest=$bdd->prepare("UPDATE questions SET title= ?,description=?,content=? WHERE id=?");
             $id=$_GET["id"];

             $newQuestionRequest->execute([$title,$description,$content,$id]);
 
             $errorMessage="updated succesfully ";
         }catch(Exception $exception){
             die($exception);
         }
 
        }

}
