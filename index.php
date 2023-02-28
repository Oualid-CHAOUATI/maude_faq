<?php
session_start();
global $deleteClass;

require("./views/components/components.php");
include("./views/includes/head.html.php");
include("./views/includes/navbar.html.php");

include("./models/MonPdo.class.php");



$userCase = empty($_GET["uc"]) ? "accueil" : $_GET["uc"];
switch ($userCase) {



    case "continents":
        global $deleteClass;
        $deleteClass = "continents";
        include("./views/includes/modal.html.php");


        include("./controllers/continent.controller.php");
        break;
    case "nationalities":
        global $deleteClass;

        $deleteClass = "nationalities";


        include("./views/includes/modal.html.php");

        include("./controllers/nationalite.controller.php");
        break;
    case "genres":
        global $deleteClass;

        $deleteClass = "genres";


        include("./views/includes/modal.html.php");

        include("./controllers/genre.controller.php");
        break;

    case "auteurs":
        global $deleteClass;

        $deleteClass = "auteurs";


        include("./views/includes/modal.html.php");

        include("./controllers/auteur.controller.php");
        break;

    case "livres":
        global $deleteClass;

        $deleteClass = "livres";


        include("./views/includes/modal.html.php");

        include("./controllers/livre.controller.php");
        break;

    case "adherents":
        global $deleteClass;

        $deleteClass = "adherents";


        include("./views/includes/modal.html.php");

        include("./controllers/adherent.controller.php");
        break;

    case "prets":
        global $deleteClass;

        $deleteClass = "prets";


        include("./views/includes/modal.html.php");

        include("./controllers/pret.controller.php");
        break;



    case "accueil":

        // $numberLivres = Livre::numberOfLivres();
        $numberLivres = "1429" . " Livres";
        $numberAdherents = "391" . "Adherents";
        include("./views/includes/modal.html.php");


        include("./Accueil.page.php");
        break;
    default:
        include("views/404.php");
}





include("./views/includes/footer.html.php");
