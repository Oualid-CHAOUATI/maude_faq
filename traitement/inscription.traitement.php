
<?php
include("../models/MonPdo.class.php");
include("../views/components/components.php");

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["mail"];
$motdepasse = $_POST["motdepasse"];
$motdepasse2 = $_POST["motdepasse2"];

if (empty($nom) || empty($prenom) || empty($email) || empty($motdepasse) || empty($motdepasse2)) {
    createMessageSuccess("faut renseigner tous les champs");
}

if ($motdepasse != $motdepasse2) {
    createMessageSuccess("les 2 mots de passes doivent concorder");
}



$req = MonPdo::getInstance()->prepare("INSERT INTO personne (nom,prenom,email,motdepasse) VALUES(:nom,:prenom,:email,:motdepasse)");


$req->bindParam(":nom", $nom);
$req->bindParam(":prenom", $prenom);
$req->bindParam(":email", $email);
$req->bindParam(":motdepasse", $motdepasse);





try {

    $res = $req->execute();
    echo "alert('inscription reussie ')";
} catch (Exception $e) {
    echo "alert('inscription non reussie ')";
    die($e->getMessage());
    echo $e;
}

header("location:../index.php");



?>