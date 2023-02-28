<?php





class Pret
{

    private $num, $num_livre, $num_adherent, $date_pret, $date_retour_prevue, $date_retour_reelle;



    public static function getAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM pret order by num desc");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pret");
        $req->execute();
        $resultArray = $req->fetchAll();
        return $resultArray;
    }


    public static function findByID(int $id)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM pret where num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pret");
        $req->bindParam(":id", $id);


        $req->execute();
        $result = $req->fetch();
        return $result;
    }




    public static function addPret(Pret $pret): bool
    {

        $req = MonPdo::getInstance()->prepare(
            "INSERT INTO pret 
        (
        num_livre,      num_adherent,       date_pret,          date_retour_prevue
        )
        VALUES
        (
        :num_livre,     :num_adherent,      :date_pret,         :date_retour_prevue
        );"
        );


        $num_livre = $pret->getNumLivre();
        $req->bindParam(":num_livre", $num_livre);

        $num_adherent = $pret->getNumAdherent();
        $req->bindParam(":num_adherent", $num_adherent);

        $date_pret = $pret->getDatePret();
        $req->bindParam(":date_pret", $date_pret);

        $date_retour_prevue = $pret->getDateRetourPrevue();
        $req->bindParam(":date_retour_prevue", $date_retour_prevue);



        try {

            $res = $req->execute();
            echo $res;
            return $res;
        } catch (Exception $e) {
            die($e->getMessage());
            echo $e;
        }

        return false;
    }

    public static function editPret(Pret $pret): bool
    {
        $req = MonPdo::getInstance()->prepare(
            "UPDATE pret SET 
            num_livre=:num_livre,      
            num_adherent=:num_adherent,       
            date_pret=:date_pret,
            date_retour_prevue=:date_retour_prevue,
            date_retour_reelle=:date_retour_reelle

            WHERE num=:num 
        "
        );

        $num = $pret->getNum();
        $req->bindParam(":num", $num);

        $num_livre = $pret->getNumLivre();
        $req->bindParam(":num_livre", $num_livre);

        $num_adherent = $pret->getNumAdherent();
        $req->bindParam(":num_adherent", $num_adherent);

        $date_pret = $pret->getDatePret();
        $req->bindParam(":date_pret", $date_pret);

        $date_retour_prevue = $pret->getDateRetourPrevue();
        $req->bindParam(":date_retour_prevue", $date_retour_prevue);

        $date_retour_reelle = $pret->getDateRetourReelle();
        $req->bindParam(":date_retour_reelle", $date_retour_reelle);






        try {

            $res = $req->execute();
            echo $res;
        } catch (Exception $e) {
            die($e->getMessage());
        }

        return false;
    }
    public static function deletePret($num)
    {
        $req = MonPdo::getInstance()->prepare("DELETE from  pret  where num = :num");
        $req->bindParam(":num", $num);
        return $req->execute();
    }
    // -----------------------------------------------------------






    /**
     * Get the value of num
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set the value of num
     *
     * @return  self
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get the value of num_livre
     */
    public function getNumLivre()
    {
        return $this->num_livre;
    }

    /**
     * Set the value of num_livre
     *
     * @return  self
     */
    public function setNumLivre($num_livre)
    {
        $this->num_livre = $num_livre;

        return $this;
    }

    /**
     * Get the value of num_adherent
     */
    public function getNumAdherent()
    {
        return $this->num_adherent;
    }

    /**
     * Set the value of num_adherent
     *
     * @return  self
     */
    public function setNumAdherent($num_adherent)
    {
        $this->num_adherent = $num_adherent;

        return $this;
    }

    /**
     * Get the value of dae_pret
     */
    public function getDatePret()
    {
        return $this->date_pret;
    }

    /**
     * Set the value of dae_pret
     *
     * @return  self
     */
    public function setDatePret($dae_pret)
    {
        $this->date_pret = $dae_pret;

        return $this;
    }

    /**
     * Get the value of date_retour_prevue
     */
    public function getDateRetourPrevue()
    {
        return $this->date_retour_prevue;
    }

    /**
     * Set the value of date_retour_prevue
     *
     * @return  self
     */
    public function setDateRetourPrevue($date_retour_prevue)
    {
        $this->date_retour_prevue = $date_retour_prevue;

        return $this;
    }

    /**
     * Get the value of date_retour_reelle
     */
    public function getDateRetourReelle()
    {
        $date = $this->date_retour_reelle;
        return  $date;
    }

    /**
     * Set the value of date_retour_reelle
     *
     * @return  self
     */
    public function setDateRetourReelle($date_retour_reelle)
    {
        $this->date_retour_reelle = $date_retour_reelle;

        return $this;
    }
}
