<?php
include("./models/Adherent.class.php");

include("./controllers/action.controller.php");
if (empty($action)) return;


$page = "adherents";
$pageBtnLabel = "adherent";
$page_label = "l'adherent ";

switch ($action) {


    case "list":



        $listOfInstances = Adherent::getAll();
        $ths = ["#", "nom", "prenom", "addr rue", "adr cp", "adr ville", "@mail", "tel", [

            "colspan" => "2",
            "value" => "action"
        ]];

        $fns = ["getNum", "getNom", "getPrenom", "getAdrRue", "getAdrCp", "getAdrVille", "getAdrMail", "getTel"];


        include("views/list.html.php");
        break;



        // -----------
        break;
        // case "add": 

    case "form":
        $mode = $_GET["mode"];
        $adherent;
        if ($mode == "edit") {
            global $adherent;
            $num = $_GET["num"];
            $adherent = Adherent::findByID($num);
        }



        include("views/$page/$page-form.html.php");


        break;
    case "request-create":

        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adr_mail = $_POST["adr_mail"];
        $tel = $_POST["tel"];
        $adr_rue = $_POST["adr_rue"];
        $adr_cp = $_POST["adr_cp"];
        $adr_ville = $_POST["adr_ville"];




        $adherent = new Adherent();
        $adherent->setNom($nom);
        $adherent->setPrenom($prenom);
        $adherent->setAdrMail($adr_mail);
        $adherent->setTel($tel);

        $adherent->setAdrRue($adr_rue);
        $adherent->setAdrCp($adr_cp);
        $adherent->setAdrVille($adr_ville);

        Adherent::addAdherent($adherent);
        createMessageSuccess("adherent ajouté!");


        header("location:index.php?uc=$page&action=list");


        break;
    case "request-edit":
        $num = $_POST["num"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adr_mail = $_POST["adr_mail"];
        $tel = $_POST["tel"];
        $adr_rue = $_POST["adr_rue"];
        $adr_cp = $_POST["adr_cp"];
        $adr_ville = $_POST["adr_ville"];




        $adherent = new Adherent();
        $adherent->setNum($num);
        $adherent->setNom($nom);
        $adherent->setPrenom($prenom);
        $adherent->setAdrMail($adr_mail);
        $adherent->setTel($tel);

        $adherent->setAdrRue($adr_rue);
        $adherent->setAdrCp($adr_cp);
        $adherent->setAdrVille($adr_ville);

        Adherent::editAdherent($adherent);
        createMessageSuccess("adherent modifié avec succés !");


        header("location:index.php?uc=$page&action=list");


        break;
    case "request-delete":


        $num = $_GET["num"];
        try {

            Adherent::deleteAdherent($num);
            echo "deleted successfully";
            createMessageSuccess("Adherent supprimé !!");
        } catch (Exception $e) {
            echo "error delete exception ";
            createMessageSuccess("Adherent en relation avec d'aures données (un pret) !!");
        }


        header("location:index.php?uc=$page&action=list");

        break;


        include("./views/404.php");
}
