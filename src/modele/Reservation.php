<?php


class Reservation
{
    private $idReservation;
    private $refUtilisateur;
    private $refVole;
    private $dateVole;
    private $idVole;
    private $heureVole;
    private $villeDep;
    private $villeArr;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                // On appelle le setter
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * @param mixed $idReservation
     */
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }

    /**
     * @return mixed
     */
    public function getRefUtilisateur()
    {
        return $this->refUtilisateur;
    }

    /**
     * @param mixed $refUtilisateur
     */
    public function setRefUtilisateur($refUtilisateur)
    {
        $this->refUtilisateur = $refUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getRefVole()
    {
        return $this->refVole;
    }

    /**
     * @param mixed $refVole
     */
    public function setRefVole($refVole)
    {
        $this->refVole = $refVole;
    }

    /**
     * @return mixed
     */
    public function getDateVole()
    {
        return $this->dateVole;
    }

    /**
     * @param mixed $dateVole
     */
    public function setDateVole($dateVole)
    {
        $this->dateVole = $dateVole;
    }

    /**
     * @return mixed
     */
    public function getIdVole()
    {
        return $this->idVole;
    }

    /**
     * @param mixed $idVole
     */
    public function setIdVole($idVole)
    {
        $this->idVole = $idVole;
    }

    /**
     * @return mixed
     */
    public function getHeureVole()
    {
        return $this->heureVole;
    }

    /**
     * @param mixed $heureVole
     */
    public function setHeureVole($heureVole)
    {
        $this->heureVole = $heureVole;
    }

    /**
     * @return mixed
     */
    public function getVilleDep()
    {
        return $this->villeDep;
    }

    /**
     * @param mixed $villeDep
     */
    public function setVilleDep($villeDep)
    {
        $this->villeDep = $villeDep;
    }

    /**
     * @return mixed
     */
    public function getVilleArr()
    {
        return $this->villeArr;
    }

    /**
     * @param mixed $villeArr
     */
    public function setVilleArr($villeArr)
    {
        $this->villeArr = $villeArr;
    }


}