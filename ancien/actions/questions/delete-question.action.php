<?php
require "../db.php";


//verifier si l'url inclus un arametre ID
if ($_GET["id"]) {
    $questionID = $_GET["id"];

    //le parametre id est-il vide ?
    if (empty($questionID)) {
        echo "question id empty";

        // header("Location: ../../questions.php");
        return;
    }

    $session_ID = $_SESSION["id"];

    try {

        $getQuestionReq = $bdd->prepare("select author_id from questions where id= ? ");
        $getQuestionReq->execute([$questionID]);
        // si la question nexiste pas sur la bdd 
        if ($getQuestionReq->rowCount() == 0) {
            echo "question not in bdd";
            // header("Location: ../../questions.php");
            return;
        }

        $questionInfo = $getQuestionReq->fetch();
        $questionAuthor_ID = $questionInfo["author_id"];
        //la personne editeur de la question et la peronne lançant la requette de suppresion sont elles les memes ?
        if ($questionAuthor_ID != $session_ID) {
            echo "vous n'etre pas lauteur de la question ";
            // header("Location: ../../questions.php");
            return;
        }


        $deleteReq = $bdd->prepare("delete from questions where id =?");
        $deleteReq->execute([$questionID]);
        header("Location: ../../questions.php");
    } catch (Exception $e) {
        die($e);
    }
}
else{
    echo "no id parameter in url";

}
