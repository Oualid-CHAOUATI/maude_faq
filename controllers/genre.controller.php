<?php
include("./models/Genre.class.php");

include("./controllers/action.controller.php");
if (empty($action)) return;


$page = "genres";
$pageBtnLabel = "genre";
$page_label = "le genre ";

switch ($action) {


    case "list":

        $listOfInstances = Genre::getAll();
        $ths = ["#", "libelle", [

            "colspan" => "2",
            "value" => "action"
        ]];

        $fns = ["getNum", "getLibelle"];

        include("views/list.html.php");
        break;



        break;

    case "form":
        $mode = $_GET["mode"];
        $genre;


        echo "<H1>genre form mode = $mode</H1>";
        if ($mode == "edit") {
            global $genre;


            $num = $_GET["num"];
            $genre = Genre::findByID($num);
        }

        include("views/$page/$page-form.html.php");


        break;



    case "request-create":


        echo "<h1>Creating genre</h1>";

        $libelle = $_POST["libelle"];
        $genre = new Genre();
        $genre->setLibelle($libelle);




        Genre::addGenre($genre);
        createMessageSuccess("Genre ajouté!");


        header("location:index.php?uc=$page&action=list");


        break;



    case "request-edit":


        //num of genre
        $num = $_POST["num"];

        //nouvelle valuer de libelle du genre
        $libelle = $_POST["libelle"];
        $genre = new Genre();
        $genre->setNum($num);
        $genre->setLibelle($libelle);
        Genre::editGenre($genre);
        createMessageSuccess("Genre modifiée!");
        header("location:index.php?uc=$page&action=list");


        break;
    case "request-delete":


        $num = $_GET["num"];
        try {

            Genre::deleteGenre($num);
            echo "deleted successfully";
        } catch (Exception $e) {
            echo "error delete exception ";
        }

        createMessageSuccess("Genre supprimé !!");

        header("location:index.php?uc=$page&action=list");

        break;


        include("./views/404.php");
}
