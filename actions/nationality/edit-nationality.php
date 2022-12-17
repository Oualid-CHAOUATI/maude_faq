<?php 
include "../../includes/head.html.php";
include "../../includes/navbar.html.php";

include "../connexion.php";



$libelle=$_POST["libelle"];
$num=$_GET["num"];
$numPost = $_POST["num"];

if(isset($numPost))echo"numpost is there ";
else  echo"numpost is not there ";

try{
$req=$pdo->prepare("UPDATE nationalite SET libelle=:libelle WHERE num=:num");
$req->bindParam(":libelle",$libelle);



    $req->bindParam(":num",$numPost);
$req->execute();
   

echo"<br/>";

    if($req->rowCount()>0)echo "nationality edited ";
      
    else echo("failed to edit nationalty ");


    


}catch(Exception $e){
    echo $e->getMessage();
    die($e->getMessage());
}





?>

<br />
<a href="../../nationalities.html.php"> show all nationalities</a>
