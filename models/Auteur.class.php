<?php



class Auteur
{

    /**
     * numéro du continent 
     * @var int
     */
    private $num;



    /**
     * nom du contiennt 
     * @var string
     */

    private $nom;


    /**
     * nom du contiennt 
     * @var string
     */

    private $prenom;




    /**
     * numéro du continent
     * @var int
     */

    private $num_nationalite;

    /** 
     * return numéro du contiennt 
     * @return int
     */
    public function getNum(): int
    {
        return $this->num;
    }



    /**
     * Get numéro du continent
     *
     * @return  int
     */
    public function getNumNationalite()
    {
        return $this->num_nationalite;
    }

    public function getLibelleNationalite()
    {
        $nat = Nationalite::findByID($this->getNumNationalite());
        if ($nat) return $nat->getLibelle();;
        return "non renseignée";
    }

    /**
     * Set numéro du continent
     *
     * @param  int  $num  numéro du continent
     *
     * @return  self
     */
    public function setNum(int $num)
    {
        $this->num = $num;

        return $this;
    }
    /**
     * Set the value of num_nationalite
     *
     * @return  self
     */
    public function setNumNationalite($num_nationalite)
    {
        $this->num_nationalite = $num_nationalite;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }



    // --------------------------------------------------------------------------------------------------------
    /**
     * récupérer tout les continent 
     * @return Auteur[]
     */
    public static function getAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM auteur order by num");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Auteur");
        $req->execute();
        $resultArray = $req->fetchAll();
        return $resultArray;
    }

    /**
     * récupérer un continent selon le Continent[num] ( son id )
     * @param int $id
    //  * @return Nationalite
     */
    // public static function findByID(int $id): Continent
    public static function findByID(int $id)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM auteur where num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Auteur");
        $req->bindParam(":id", $id);


        $req->execute();
        $result = $req->fetch();
        return $result;
    }




    public static function addAuteur(Auteur $c): bool
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO auteur (nom,prenom,num_nationalite) VALUES(:nom,:prenom,:num_nationalite)");
        $nom = $c->getNom();
        $req->bindParam(":nom", $nom);

        $prenom = $c->getPrenom();
        $req->bindParam(":prenom", $prenom);

        $num_nationalite = $c->getNumNationalite();
        $req->bindParam(":num_nationalite", $num_nationalite);



        try {

            $res = $req->execute();
            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }



    public static function editAuteur(Auteur $auteur): bool
    {
        $req = MonPdo::getInstance()->prepare("UPDATE auteur SET nom = :nom ,prenom =:prenom,  num_nationalite=:num_nationalite where num = :num");

        $num = $auteur->getNum();
        $req->bindParam(":num", $num);

        $nom = $auteur->getNom();
        $req->bindParam(":nom", $nom);

        $prenom = $auteur->getPrenom();
        $req->bindParam(":prenom", $prenom);

        $num_nationalite = $auteur->getNumNationalite();
        $req->bindParam(":num_nationalite", $num_nationalite);


        return $req->execute();
    }
    public static function deleteAuteur($num)
    {
        $req = MonPdo::getInstance()->prepare("DELETE from  auteur  where num = :num");
        $req->bindParam(":num", $num);
        return $req->execute();
    }
}
