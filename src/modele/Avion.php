<?php

class Avion
{
private $idAvion;
private $modeleAvion;
private $capaciteAvion;
private $imgAvion;

    /**
     * @return mixed
     */
    public function getIdAvion()
    {
        return $this->idAvion;
    }

    /**
     * @param mixed $idAvion
     */
    public function setIdAvion($idAvion)
    {
        $this->idAvion = $idAvion;
    }

    /**
     * @return mixed
     */
    public function getModeleAvion()
    {
        return $this->modeleAvion;
    }

    /**
     * @param mixed $modeleAvion
     */
    public function setModeleAvion($modeleAvion)
    {
        $this->modeleAvion = $modeleAvion;
    }

    /**
     * @return mixed
     */
    public function getCapaciteAvion()
    {
        return $this->capaciteAvion;
    }

    /**
     * @param mixed $capaciteAvion
     */
    public function setCapaciteAvion($capaciteAvion)
    {
        $this->capaciteAvion = $capaciteAvion;
    }

    /**
     * @return mixed
     */
    public function getImgAvion()
    {
        return $this->imgAvion;
    }

    /**
     * @param mixed $imgAvion
     */
    public function setImgAvion($imgAvion)
    {
        $this->imgAvion = $imgAvion;
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