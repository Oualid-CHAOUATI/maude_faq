<?php

class Continent
{

    /**
     * numéro du continent 
     * @var int
     */
    private $num;
    /**
     * libelle du contiennt 
     * @var string
     */
    private $libelle;


    /** 
     * return numéro du contiennt 
     * @return int
     */
    public function getNum(): int
    {
        return $this->num + 0;
    }
    /** 
     * return numéro du contiennt 
     * @return int
     */
    public function setNum($num): self
    {
        $this->num = $num;
        return $this;
    }

    /**
     * return le libelle du contienent 
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }




    /**
     * Set libelle du contiennt
     *
     * @param  string  $libelle  libelle du contiennt
     *
     * @return  self
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;
        return $this;
    }


    /**
     * récupérer tout les continent 
     * @return Continent[]
     */
    public static function getAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM continent order by num");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Continent");
        $req->execute();
        $resultArray = $req->fetchAll();
        return $resultArray;
    }

    /**
     * récupérer un continent selon le Continent[num] ( son id )
     * @param int $id
     * @return Continent
     */
    public static function findByID(int $id): Continent
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM continent where num = :id");
        $req->bindParam(":id", $id);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Continent");

        $req->execute();
        $resultContinent = $req->fetch();
        return $resultContinent;
    }
    public static function addContinent(Continent $c): bool
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO continent (libelle) VALUES(:libelle)");
        $libelle = $c->getLibelle();
        // mettre $c->getLibelle() comme param à bindParam ne fonctionne pas 
        $req->bindParam(":libelle", $libelle);

        $res = $req->execute();


        return $res;
    }
    public static function editContinent(Continent $continent): bool
    {
        $req = MonPdo::getInstance()->prepare("UPDATE continent SET libelle = :libelle  where num = :num");

        $lib = $continent->getLibelle();
        $numContinent = $continent->getNum();
        echo $numContinent;
        echo "--";
        $req->bindParam(":libelle", $lib);
        $req->bindParam(":num", $numContinent);

        return $req->execute();
    }
    public static function deleteContinent($num)
    {
        $req = MonPdo::getInstance()->prepare("DELETE from  continent  where num = :num");
        $req->bindParam(":num", $num);
        return $req->execute();
    }
}
