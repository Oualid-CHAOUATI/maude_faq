<?php


function formatString($str)
{
    $str_array = explode("_", $str);
    $new_string = "get";
    foreach ($str_array as $word) {

        $new_string .= ucfirst($word);
    }
    return $new_string;
}

class Livre
{

    private $num, $isbn, $titre, $prix, $annee, $editeur, $langue, $num_auteur, $num_genre;

    public function getNomAuteur()

    {
        try {

            if ($this->getNumAuteur() == null) return "empty";
            $res = Auteur::findByID($this->getNumAuteur())->getNom();
            return $res;
        } catch (Exception $e) {
            return "error";
        }
    }
    public function getLibelleGenre()

    {
        if ($this->getNumGenre() == null) return "empty";
        return  Genre::findByID($this->getNumGenre())->getLibelle();
    }


    public function getNumGenre()
    {
        return $this->num_genre;
    }


    public function setNumGenre($num_genre)
    {
        $this->num_genre = $num_genre;

        return $this;
    }
    public function getNumAuteur()
    {
        return $this->num_auteur;
    }

    public function setNumAuteur($num_auteur)
    {
        $this->num_auteur = $num_auteur;

        return $this;
    }
    public function getLangue()
    {
        return $this->langue;
    }


    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    public function getNum(): int
    {
        return $this->num;
    }






    public function setNum(int $num)
    {
        $this->num = $num;

        return $this;
    }







    public function getIsbn()
    {
        return $this->isbn;
    }


    public function setIsbn(string $isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getTitre()
    {
        return $this->titre;
    }


    public function setTitre(string $titre)
    {
        $this->titre = $titre;

        return $this;
    }


    public function getPrix()
    {
        return $this->prix;
    }


    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAnnee()
    {
        return $this->annee;
    }


    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }
    public function getEditeur()
    {
        return $this->editeur;
    }


    public function setEditeur($editeur)
    {
        $this->editeur = $editeur;

        return $this;
    }

    // ------------------------------------------------
    public static function getAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM livre order by num desc");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Livre");
        $req->execute();
        $resultArray = $req->fetchAll();
        return $resultArray;
    }


    public static function findByID(int $id)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM livre where num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Livre");
        $req->bindParam(":id", $id);


        $req->execute();
        $result = $req->fetch();
        return $result;
    }




    public static function addLivre(Livre $livre): bool
    {

        $attrs = explode(" ", "isbn titre langue prix editeur annee num_auteur num_genre");
        $len = count($attrs);

        $reqString = "INSERT INTO livre (";

        for ($i = 0; $i < $len; $i++) {
            if ($i != 0) $reqString .= ",";
            $reqString .= $attrs[$i];
        }

        $reqString .= ") VALUES(";
        for ($i = 0; $i < $len; $i++) {
            if ($i != 0) $reqString .= ",";
            $reqString .= ":$attrs[$i]";
        }
        $reqString .= ");";

        $req = MonPdo::getInstance()->prepare($reqString);



        // ? ceci est censé replacé ---------------

        // for ($i = 0; $i < $len; $i++) {
        //     $attr = $attrs[$i];
        //     $meth = formatString($attr);
        //     $value = $livre->$meth();
        //     $req->bindParam(":" . $attr, $value);
        //     echo "<br/>";
        //     echo ($attr . "-");
        //     echo ($meth . "()-");
        //     echo ($value);
        // }

        // ?-----------------------




        // ! cà .. remplacer çàaaaa ... !d'ici jusqu' ... --------------------------------------------------------------


        $isbn = $livre->getIsbn();
        $req->bindParam(":isbn", $isbn);

        $titre = $livre->getTitre();
        $req->bindParam(":titre", $titre);

        $langue = $livre->getLangue();
        $req->bindParam(":langue", $langue);

        $prix = $livre->getPrix();
        $req->bindParam(":prix", $prix);

        $editeur = $livre->getEditeur();
        $req->bindParam(":editeur", $editeur);


        $annee = $livre->getAnnee();
        $req->bindParam(":annee", $annee);


        $num_auteur = $livre->getNumAuteur();
        $req->bindParam(":num_auteur", $num_auteur);

        $num_genre = $livre->getNumGenre();
        $req->bindParam(":num_genre", $num_genre);

        // !!jusqu'à  ici--------------------------------------------------------------


        try {

            $res = $req->execute();
            // return $res;
        } catch (Exception $e) {
            die($e->getMessage());
            echo $e;
        }

        return false;
    }



    public static function editLivre(Livre $livre): bool




    {



        $req = MonPdo::getInstance()->prepare("UPDATE livre SET 
        isbn = :isbn,
        titre = :titre,
        prix =:prix,
        editeur =:editeur,
        annee=:annee,
        langue =:langue,
        num_auteur =:num_auteur,
        num_genre =:num_genre
         where num =:num ");

        $num = $livre->getNum();
        $req->bindParam(":num", $num);

        $isbn = $livre->getIsbn();
        $req->bindParam(":isbn", $isbn);

        $titre = $livre->getTitre();
        $req->bindParam(":titre", $titre);

        $prix = $livre->getPrix();
        $req->bindParam(":prix", $prix);

        $editeur = $livre->getEditeur();
        $req->bindParam(":editeur", $editeur);

        $annee = $livre->getAnnee();
        $req->bindParam(":annee", $annee);

        $langue = $livre->getLangue();
        $req->bindParam(":langue", $langue);

        $num_auteur = $livre->getNumAuteur();
        $req->bindParam(":num_auteur", $num_auteur);

        $num_genre = $livre->getNumGenre();
        $req->bindParam(":num_genre", $num_genre);



        try {

            $res = $req->execute();
            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }
    public static function deleteLivre($num)
    {
        $req = MonPdo::getInstance()->prepare("DELETE from  livre  where num = :num");
        $req->bindParam(":num", $num);
        return $req->execute();
    }
}
