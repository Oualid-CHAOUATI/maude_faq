<?php
include("./models/Nationality.class.php");
include("./models/Continent.class.php");

include("./controllers/action.controller.php");
if (empty($action)) return;


$page = "nationalities";
$pageBtnLabel = "nationality";
$page_label = "la nationalite ";

switch ($action) {


    case "list":

        $listOfInstances = Nationalite::getAll();
        $ths = ["#", "nationalite", "continent", [

            "colspan" => "2",
            "value" => "action"
        ]];

        $fns = ["getNum", "getLibelle", "getLibelleContinent"];

        include("views/list.html.php");
        break;



        // -----------
        break;
        // case "add": 

    case "form":
        $mode = $_GET["mode"];
        $nationalite;
        if ($mode == "edit") {
            global $nationalite;
            $num = $_GET["num"];
            $nationalite = Nationalite::findByID($num);
        }
        $continents = Continent::getAll();

        include("views/$page/$page-form.html.php");


        break;
    case "request-create":
        $libelle = $_POST["libelle"];

        //Num continent
        $continent_num = $_POST["continent"];




        $nationalite = new Nationalite();
        $nationalite->setLibelle($libelle);
        $nationalite->setNumContinent($continent_num);
        Nationalite::addNationalite($nationalite);
        createMessageSuccess("Nationalite ajouté!");


        header("location:index.php?uc=$page&action=list");


        break;
    case "request-edit":


        $num = $_POST["num"];

        $libelle = $_POST["libelle"];

        //Num continent
        $nationalite_num = $_POST["continent"];

        $nationalite = new Nationalite();
        $nationalite->setLibelle($libelle);
        $nationalite->setNum($num);
        $nationalite->setNumContinent($nationalite_num);


        Nationalite::editNationalite($nationalite);
        createMessageSuccess("Nationalite modifiée!");

        header("location:index.php?uc=$page&action=list");


        break;
    case "request-delete":


        $num = $_GET["num"];
        try {

            Nationalite::deleteNationalite($num);
            echo "deleted successfully";
        } catch (Exception $e) {
            echo "error delete exception ";
        }

        createMessageSuccess("Nationalite supprimé !!");

        header("location:index.php?uc=$page&action=list");

        break;


        include("./views/404.php");
}
