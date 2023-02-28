<?php
include("./models/Genre.class.php");
include("./models/Auteur.class.php");
include("./models/Livre.class.php");

include("./controllers/action.controller.php");
if (empty($action)) return;


$page = "livres";
$pageBtnLabel = "livrelivre";
$page_label = "le livre";

switch ($action) {


    case "list":

        $listOfInstances = Livre::getAll();
        $ths = ["#", "isbn", "titre", "langue", "prix", "editeur", "annee", "auteur", "genre", [

            "colspan" => "2",
            "value" => "action"
        ]];

        $fns = ["getNum", "getIsbn", "getTitre", "getLangue", "getPrix", "getEditeur", "getAnnee", "getNomAuteur", "getLibelleGenre"];

        include("views/list.html.php");
        break;



        // -----------
        break;
        // case "add": 

    case "form":
        $mode = $_GET["mode"];
        $livre;
        if ($mode == "edit") {
            global $livre;
            $num = $_GET["num"];
            $livre = Livre::findByID($num);
        }


        $auteurs = Auteur::getAll();
        $genres = Genre::getAll();

        include("views/$page/$page-form.html.php");


        break;
    case "request-create":

        $isbn = $_POST["isbn"];
        $titre = $_POST["titre"];
        $langue = $_POST["langue"];
        $prix = $_POST["prix"];
        $editeur = $_POST["editeur"];
        $annee = $_POST["annee"];
        $num_auteur = $_POST["num_auteur"];
        $num_genre = $_POST["num_genre"];

        $livre = new Livre();
        $livre->setIsbn($isbn);
        $livre->setTitre($titre);
        $livre->setLangue($langue);
        $livre->setPrix($prix);
        $livre->setEditeur($editeur);
        $livre->setAnnee($annee);
        $livre->setNumAuteur($num_auteur);
        $livre->setNumGenre($num_genre);



        $res = Livre::addLivre($livre);
        createMessageSuccess("livre ajouté! $res");


        header("location:index.php?uc=$page&action=list");


        break;
    case "request-edit":
        $num = $_POST["num"];
        $isbn = $_POST["isbn"];
        $titre = $_POST["titre"];
        $langue = $_POST["langue"];
        $prix = $_POST["prix"];
        $editeur = $_POST["editeur"];
        $annee = $_POST["annee"];
        $num_auteur = $_POST["num_auteur"];
        $num_genre = $_POST["num_genre"];

        $livre = new Livre();
        $livre->setNum($num);

        $livre->setIsbn($isbn);
        $livre->setTitre($titre);
        $livre->setLangue($langue);
        $livre->setPrix($prix);
        $livre->setEditeur($editeur);
        $livre->setAnnee($annee);
        $livre->setNumAuteur($num_auteur);
        $livre->setNumGenre($num_genre);


        $res = Livre::editLivre($livre);

        echo " res = $res";
        createMessageSuccess("livre modifié! $res");
        header("location:index.php?uc=$page&action=list");

        break;
    case "request-delete":


        $num = $_GET["num"];
        $res;
        try {
            global $res;
            $res = Livre::deleteLivre($num);
        } catch (Exception $e) {

            header("location:index.php?uc=$page&action=list");
            return   createMessageSuccess("Error .. ce livre est en pret");
        }


        createMessageSuccess("Livre a été supprimé");
        header("location:index.php?uc=$page&action=list");




        break;


        include("./views/404.php");
}
