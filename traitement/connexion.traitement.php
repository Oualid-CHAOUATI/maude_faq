
<?php
session_start();

include("../models/MonPdo.class.php");
include("../views/components/components.php");


$email = $_POST["mail"];
$motdepasse = $_POST["motdepasse"];

if (empty($nom) || empty($prenom) || empty($email) || empty($motdepasse) || empty($motdepasse2)) {
    createMessageSuccess("faut renseigner tous les champs");
}




$req = MonPdo::getInstance()->prepare("select * from  personne where email =:email and motdepasse=:motdepasse");


$req->bindParam(":email", $email);
$req->bindParam(":motdepasse", $motdepasse);





try {
    // global $res;
    $res = $req->execute();
    echo "res===";
    $connected = $req->rowCount();
    if ($connected) {
        $res = $req->fetch();
        $_SESSION["nom"] = $res["nom"];
        $_SESSION["prenom"] = $res["prenom"];
        // echo var_dump($res);
        return header("location:../index.php?uc=accueil");
    }
    echo "----connecté";
    header("location:index.php");
    return $res;
} catch (Exception $e) {
    echo "erreur de connexion";
    header("location: index.php");
    die($e->getMessage());
    echo $e;
}




?>