<?php





class Adherent
{

    private $num, $nom, $prenom, $adr_rue, $adr_cp, $adr_ville, $adr_mail, $tel;



    public static function getAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM adherent order by num desc");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Adherent");
        $req->execute();
        $resultArray = $req->fetchAll();
        return $resultArray;
    }


    public static function findByID(int $id)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM adherent where num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Adherent");
        $req->bindParam(":id", $id);


        $req->execute();
        $result = $req->fetch();
        return $result;
    }




    public static function addAdherent(Adherent $adherent): bool
    {

        $req = MonPdo::getInstance()->prepare(
            "INSERT INTO adherent 
        (num,  nom,     prenom,     adr_rue,    adr_cp,     adr_ville,      adr_mail,   tel)
        VALUES
        (:num, :nom,    :prenom,    :adr_rue,   :adr_cp,    :adr_ville,     :adr_mail,  :tel);"
        );


        $num = $adherent->getNum();
        $req->bindParam(":num", $num);

        $nom = $adherent->getNom();
        $req->bindParam(":nom", $nom);

        $prenom = $adherent->getPrenom();
        $req->bindParam(":prenom", $prenom);

        $adr_rue = $adherent->getAdrRue();
        $req->bindParam(":adr_rue", $adr_rue);

        $adr_cp = $adherent->getAdrCp();
        $req->bindParam(":adr_cp", $adr_cp);

        $adr_ville = $adherent->getAdrVille();
        $req->bindParam(":adr_ville", $adr_ville);

        $adr_mail = $adherent->getAdrMail();
        $req->bindParam(":adr_mail", $adr_mail);

        $tel = $adherent->getTel();
        $req->bindParam(":tel", $tel);





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

    public static function editAdherent(Adherent $adherent): bool
    {
        $req = MonPdo::getInstance()->prepare(
            "UPDATE ADHERENT SET 
        num=:num,
        nom=:nom,
        prenom=:prenom,
        adr_rue=:adr_rue,
        adr_cp=:adr_cp,
        adr_ville=:adr_ville,
        adr_mail=:adr_mail,
        tel=:tel
        WHERE num = :num
        ;"
        );



        $num = $adherent->getNum();
        $req->bindParam(":num", $num);

        $nom = $adherent->getNom();
        $req->bindParam(":nom", $nom);

        $prenom = $adherent->getPrenom();
        $req->bindParam(":prenom", $prenom);

        $adr_rue = $adherent->getAdrRue();
        $req->bindParam(":adr_rue", $adr_rue);

        $adr_cp = $adherent->getAdrCp();
        $req->bindParam(":adr_cp", $adr_cp);

        $adr_ville = $adherent->getAdrVille();
        $req->bindParam(":adr_ville", $adr_ville);

        $adr_mail = $adherent->getAdrMail();
        $req->bindParam(":adr_mail", $adr_mail);

        $tel = $adherent->getTel();
        $req->bindParam(":tel", $tel);



        try {

            $res = $req->execute();
            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }
    public static function deleteAdherent($num)
    {
        $req = MonPdo::getInstance()->prepare("DELETE from  adherent  where num = :num");
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

    /**
     * Get the value of adr_rue
     */
    public function getAdrRue()
    {
        return $this->adr_rue;
    }

    /**
     * Set the value of adr_rue
     *
     * @return  self
     */
    public function setAdrRue($adr_rue)
    {
        $this->adr_rue = $adr_rue;

        return $this;
    }

    /**
     * Get the value of adr_cp
     */
    public function getAdrCp()
    {
        return $this->adr_cp;
    }

    /**
     * Set the value of adr_cp
     *
     * @return  self
     */
    public function setAdrCp($adr_cp)
    {
        $this->adr_cp = $adr_cp;

        return $this;
    }

    /**
     * Get the value of adr_ville
     */
    public function getAdrVille()
    {
        return $this->adr_ville;
    }

    /**
     * Set the value of adr_ville
     *
     * @return  self
     */
    public function setAdrVille($adr_ville)
    {
        $this->adr_ville = $adr_ville;

        return $this;
    }

    /**
     * Get the value of adr_mail
     */
    public function getAdrMail()
    {
        return $this->adr_mail;
    }

    /**
     * Set the value of adr_mail
     *
     * @return  self
     */
    public function setAdrMail($adr_mail)
    {
        $this->adr_mail = $adr_mail;

        return $this;
    }

    /**
     * Get the value of tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }
}
