<?php

class Vole
{
private $idVole;
private $dateVole;
private $heureVole;
private $villeDep;
private $villeArr;
private $refAvion;
private $refCompagnie;

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

    /**
     * @return mixed
     */
    public function getRefAvion()
    {
        return $this->refAvion;
    }

    /**
     * @param mixed $refAvion
     */
    public function setRefAvion($refAvion)
    {
        $this->refAvion = $refAvion;
    }

    /**
     * @return mixed
     */
    public function getRefCompagnie()
    {
        return $this->refCompagnie;
    }

    /**
     * @param mixed $refCompagnie
     */
    public function setRefCompagnie($refCompagnie)
    {
        $this->refCompagnie = $refCompagnie;
    }

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (is_callable(array($this, $method)))
            {
                $this->$method($value);
            }
        }
    }

}