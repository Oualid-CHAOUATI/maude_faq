<?php
require "actions/db.php";

//require permettra de planter da page s'i ya une erreur au niveau du fichier importé 

session_start();


if(isset($_POST["submit"])){

    
    $errorMessageBase="veuillez reneinger le ";
    $allFieldsAreSet=true;

    //? verifier si les champs sont vides ou pas 
    
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
    //___________________________________________________________________

    //?verifier si les champs sont vides ou pas 
   if($allFieldsAreSet){
       $title = htmlspecialchars($_POST["title"]);
       $description = htmlspecialchars($_POST["description"]);
       $content = 
       nl2br(htmlspecialchars($_POST["content"]));
        $date = date("y/m/d");
        session_start();

        $authorID=$_SESSION["id"];
        // $authorID="2323";



        try{

            $newQuestionRequest=$bdd->prepare("INSERT into questions (title,description,content,author_ID,publication_date) VALUES(?,?,?,?,?)");
            $newQuestionRequest->execute([$title,$description,$content,$authorID,$date]);

            $errorMessage="question created succesfully ";
        }catch(Exception $exception){
            die($exception);
        }


        // if(empty($authorID))$authorID="nadaa";

       $errorMessage=$title."   ".$description."    ".$content." --id = ".$authorID." pseudo  ".$_SESSION["pseudo"];


      
    }




    
    
    

   
}