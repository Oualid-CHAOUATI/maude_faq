<?php
include("./models/Nationality.class.php");
include("./models/Auteur.class.php");

include("./controllers/action.controller.php");
if (empty($action)) return;


$page = "auteurs";
$pageBtnLabel = "auteur";
$page_label = "l'auteur ";

switch ($action) {


    case "list":

        $listOfInstances = Auteur::getAll();
        $ths = ["#", "nom", "prenom", "nationalite", [

            "colspan" => "2",
            "value" => "action"
        ]];

        $fns = ["getNum", "getNom", "getPrenom", "getLibelleNationalite"];

        include("views/list.html.php");
        break;



        // -----------
        break;
        // case "add": 

    case "form":
        $mode = $_GET["mode"];
        $auteur;
        if ($mode == "edit") {
            global $auteur;
            $num = $_GET["num"];
            $auteur = Auteur::findByID($num);
        }


        $nationalities = Nationalite::getAll();

        include("views/$page/$page-form.html.php");


        break;
    case "request-create":

        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $numNationalite = $_POST["numNationalite"];



        $auteur = new Auteur();
        $auteur->setNom($nom);
        $auteur->setPrenom($prenom);
        $auteur->setNumNationalite($numNationalite);

        Auteur::addAuteur($auteur);
        createMessageSuccess("auteur ajouté!");


        header("location:index.php?uc=$page&action=list");


        break;
    case "request-edit":

        $num = $_POST["num"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $numNationalite = $_POST["numNationalite"];



        $auteur = new Auteur();
        $auteur->setNum($num);
        $auteur->setNom($nom);
        $auteur->setPrenom($prenom);
        $auteur->setNumNationalite($numNationalite);

        Auteur::editAuteur($auteur);
        createMessageSuccess("auteur modifié!");


        header("location:index.php?uc=$page&action=list");


        break;
    case "request-delete":


        $num = $_GET["num"];
        try {

            Auteur::deleteAuteur($num);
            echo "deleted successfully";
        } catch (Exception $e) {
            echo "error delete exception ";
        }

        createMessageSuccess("auteur supprimé !!");

        header("location:index.php?uc=$page&action=list");

        break;


        include("./views/404.php");
}
