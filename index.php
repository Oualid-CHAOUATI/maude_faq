<?php
session_start();
global $deleteClass;

require("./views/components/components.php");
include("./views/includes/head.html.php");
// include("./views/includes/navbar.html.php");

include("./models/MonPdo.class.php");



$userCase = empty($_GET["uc"]) ? "connexion" : $_GET["uc"];
switch ($userCase) {



    case "faq":

        include("./views/faq-form/faq-form.html.php");

        break;
    case "inscriptions":



        include("./views/inscription/inscription-form.html.php");
        break;



    case "connexion":


        include("./views/connexion/connexion-form.html.php");
        break;

    case "accueil":


        include("./views/accueil/accueil.html.php");
        break;
    default:
        include("views/404.php");
}





include("./views/includes/footer.html.php");
