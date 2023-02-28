<?php
include("./models/Continent.class.php");

include("./controllers/action.controller.php");
if (empty($action)) return;

$page = "continents";
$pageBtnLabel = "continent";
$page_label = "le continent ";

switch ($action) {


    case "list":
        $listOfInstances = Continent::getAll();
        $ths = ["#", tableHeaderCell_icon("continent_libelle"), [

            "colspan" => "2",
            "value" => "action"
        ]];

        $fns = ["getNum", "getLibelle"];

        include("views/list.html.php");
        break;


    case "form":
        $mode = $_GET["mode"];
        $continent;
        if ($mode == "edit") {
            global $continent;
            $num = $_GET["num"];
            $continent = Continent::findByID($num);
        }

        include("views/$page/$page-form.html.php");


        break;

    case "request-create":
        $libelle = $_POST["libelle"];
        $continent = new Continent();
        $continent->setLibelle($libelle);

        try {

            Continent::addContinent($continent);
            createMessageSuccess("continent créé!");
        } catch (Exception $ex) {
            createMessageSuccess("continent déjà existant!");
        }

        header("location:index.php?uc=$page&action=list");


        break;
    case "request-edit":
        $num = $_POST["num"];
        $libelle = $_POST["libelle"];

        $continent = new Continent();
        $continent->setLibelle($libelle);
        $continent->setNum($num);

        Continent::editContinent($continent);
        createMessageSuccess("continent modifiée!");

        header("location:index.php?uc=$page&action=list");


        break;



    case "request-delete":


        $num = $_GET["num"];
        try {

            Continent::deleteContinent($num);
            echo "deleted successfully";
            createMessageSuccess("continent supprimé !!");
        } catch (Exception $e) {
            echo "error delete exception ";
            createMessageSuccess("Erreur de supression ! continent en relation avec d'autres données !!");
        }


        header("location:index.php?uc=$page&action=list");

        break;

        // case "edit":

    default:
        include("./views/404.php");
}
