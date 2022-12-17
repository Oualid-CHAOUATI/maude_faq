<?php 
include "../../includes/head.html.php";
include "../../includes/navbar.html.php";

include "../connexion.php";



$num=$_GET["num"];
if(!isset($_GET["remove-modal"])){


try{
$req=$pdo->prepare("DELETE FROM nationalite WHERE num=:num");
$req->bindParam(":num",$num);

$req->execute();

echo"<br/>";

    if($req->rowCount()>0)echo "nationality removeed ";
      
    else echo("failed to remove nationalty ");


    


}catch(Exception $e){
    echo $e->getMessage();
    die($e->getMessage());
}

}




?>

<br />
<a href="../../nationalities.html.php"> show all nationalities</a>
