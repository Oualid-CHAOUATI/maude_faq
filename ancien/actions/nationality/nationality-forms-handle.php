<?php 
include "../../includes/head.html.php";
include "../../includes/navbar.html.php";

include "../connexion.php";



$libelle=$_POST["libelle"];
$num=$_GET["num"];
$numPost = $_POST["num"];

if(isset($numPost))echo"numpost is there ";
else  echo"numpost is not there ";

$req=$pdo->prepare("UPDATE nationalite SET libelle=:libelle WHERE num=:num");
$req->bindParam(":libelle",$libelle);
$req->bindParam(":num",$numPost);



try{

   $result= $req->execute();
   echo "result = $result";

    if($result)echo "nationality edited ";
      
    else echo("failed to edit nationalty ");


    


}catch(Exception $e){
    die($e->getMessage());
}





?>


<a href="../../nationalities.html.php"> show all nationalities</a>
