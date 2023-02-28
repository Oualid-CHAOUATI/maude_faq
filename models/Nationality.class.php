<?php



class Nationalite
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
     * numéro du continent
     * @var int
     */
    private $num_continent;

    /** 
     * return numéro du contiennt 
     * @return int
     */
    public function getNum(): int
    {
        return $this->num;
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
     * Get numéro du continent
     *
     * @return  int
     */
    public function getNumContinent(): int
    {
        return $this->num_continent;
    }
    public function getLibelleContinent(): string
    {
        return Continent::findByID($this->getNumContinent())->getLibelle();
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
     * Set numéro du continent
     *
     * @param  int  $num_continent  numéro du continent
     *
     * @return  self
     */
    public function setNumContinent(int $num_continent)
    {
        $this->num_continent = $num_continent;

        return $this;
    }




    // --------------------------------------------------------------------------------------------------------
    /**
     * récupérer tout les continent 
     * @return Nationalite[]
     */
    public static function getAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM nationalite order by num");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Nationalite");
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
        $req = MonPdo::getInstance()->prepare("SELECT * FROM nationalite where num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Nationalite");
        $req->bindParam(":id", $id);


        $req->execute();
        $result = $req->fetch();
        return $result;
    }




    public static function addNationalite(Nationalite $c): bool
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO nationalite (libelle,num_continent) VALUES(:libelle,:num_continent)");
        $libelle = $c->getLibelle();
        $num_continent = $c->getNumContinent();

        // mettre $c->getLibelle() comme param à bindParam ne fonctionne pas 
        $req->bindParam(":libelle", $libelle);
        $req->bindParam(":num_continent", $num_continent);

        try {

            $res = $req->execute();
            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }



    public static function editNationalite(Nationalite $nationalite): bool
    {
        $req = MonPdo::getInstance()->prepare("UPDATE nationalite SET libelle = :libelle , num_continent=:num_continent where num = :num");
        $num = $nationalite->getNum();
        $req->bindParam(":num", $num);

        $lib = $nationalite->getLibelle();
        $req->bindParam(":libelle", $lib);

        $numContinent = $nationalite->getNumContinent();
        $req->bindParam(":num_continent", $numContinent);


        return $req->execute();
    }
    public static function deleteNationalite($num)
    {
        $req = MonPdo::getInstance()->prepare("DELETE from  nationalite  where num = :num");
        $req->bindParam(":num", $num);
        return $req->execute();
    }
}
