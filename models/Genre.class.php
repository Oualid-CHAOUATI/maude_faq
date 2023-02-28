<?php



class Genre
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




    // --------------------------------------------------------------------------------------------------------
    /**
     * récupérer tout les continent 
     * @return Nationalite[]
     */
    public static function getAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM genre order by num");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Genre");
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
        $req = MonPdo::getInstance()->prepare("SELECT * FROM genre where num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Genre");
        $req->bindParam(":id", $id);


        $req->execute();
        $result = $req->fetch();
        return $result;
    }




    public static function addGenre(Genre $g): bool
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO genre (libelle) VALUES(:libelle)");

        $libelle = $g->getLibelle();

        $req->bindParam(":libelle", $libelle);

        try {

            $res = $req->execute();
            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }



    public static function editGenre(Genre $genre): bool
    {
        $req = MonPdo::getInstance()->prepare("UPDATE genre SET libelle =:libelle where num = :num");

        $num = $genre->getNum();
        $req->bindParam(":num", $num);

        $libelle = $genre->getLibelle();
        $req->bindParam(":libelle", $libelle);

        return $req->execute();
    }
    public static function deleteGenre($num)
    {
        $req = MonPdo::getInstance()->prepare("DELETE from  genre  where num = :num");
        $req->bindParam(":num", $num);
        return $req->execute();
    }
}
