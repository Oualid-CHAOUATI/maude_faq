<?php
include("./models/Pret.class.php");
include("./models/Livre.class.php");
include("./models/Adherent.class.php");

include("./controllers/action.controller.php");
if (empty($action)) return;


$page = "prets";
$pageBtnLabel = "pret";
$page_label = "le pret ";

switch ($action) {


    case "list":

        $listOfInstances = Pret::getAll();
        $ths = ["num", "num_livre", "num_adherent", "date_pret", "date_retour_prevue", "date_retour_reelle", [

            "colspan" => "2",
            "value" => "action"
        ]];

        $fns = ["getNum", "getNumLivre", "getNumAdherent", "getDatePret", "getDateRetourPrevue", "getDateRetourReelle"];

        include("views/list.html.php");
        break;



        // -----------
        break;

    case "form":
        $mode = $_GET["mode"];
        $pret = null;
        if ($mode == "edit") {
            global $pret;
            $num = $_GET["num"];
            $pret = Pret::findByID($num);
        }


        $livres = Livre::getAll();
        $adherents = Adherent::getAll();

        include("views/$page/$page-form.html.php");


        break;
    case "request-create":

        $num_livre = $_POST["num_livre"];
        $num_adherent = $_POST["num_adherent"];
        $date_pret = $_POST["date_pret"];
        $date_retour_prevue = $_POST["date_retour_prevue"];


        $pret = new Pret($num_livre, $num_adherent, $date_pret, $date_retour_prevue);

        $pret->setNumLivre($num_livre);;
        $pret->setNumAdherent($num_adherent);;
        $pret->setDatePret($date_pret);;
        $pret->setDateRetourPrevue($date_retour_prevue);;
        echo var_dump($pret);

        Pret::addPret($pret);
        createMessageSuccess("pret ajouté!");


        header("location:index.php?uc=$page&action=list");


        break;
    case "request-edit":

        $num = $_POST["num"];
        $num_livre = $_POST["num_livre"];
        $num_adherent = $_POST["num_adherent"];
        $date_pret = $_POST["date_pret"];
        $date_retour_prevue = $_POST["date_retour_prevue"];
        $date_retour_reelle = $_POST["date_retour_reelle"];


        $pret = new Pret();

        $pret->setNum($num);;
        $pret->setNumLivre($num_livre);;
        $pret->setNumAdherent($num_adherent);;
        $pret->setDatePret($date_pret);;
        $pret->setDateRetourPrevue($date_retour_prevue);;
        $pret->setDateRetourReelle($date_retour_reelle);;
        echo var_dump($pret);

        Pret::editPret($pret);
        createMessageSuccess("pret modifié!");


        header("location:index.php?uc=$page&action=list");


        break;
    case "request-delete":


        $num = $_GET["num"];
        try {

            Pret::deletePret($num);
            echo "deleted successfully";
        } catch (Exception $e) {
            echo "error delete exception ";
        }

        createMessageSuccess("pret supprimé !!");

        header("location:index.php?uc=$page&action=list");

        break;


        include("./views/404.php");
}
