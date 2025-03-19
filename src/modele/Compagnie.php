<?php

class Compagnie
{
private $idCompagnie;
private $nomCompagnie;
private $imgCompagnie;

    /**
     * @return mixed
     */
    public function getIdCompagnie()
    {
        return $this->idCompagnie;
    }

    /**
     * @param mixed $idCompagnie
     */
    public function setIdCompagnie($idCompagnie)
    {
        $this->idCompagnie = $idCompagnie;
    }

    /**
     * @return mixed
     */
    public function getImgCompagnie()
    {
        return $this->imgCompagnie;
    }

    /**
     * @param mixed $imgCompagnie
     */
    public function setImgCompagnie($imgCompagnie)
    {
        $this->imgCompagnie = $imgCompagnie;
    }

    /**
     * @return mixed
     */
    public function getNomCompagnie()
    {
        return $this->nomCompagnie;
    }

    /**
     * @param mixed $nomCompagnie
     */
    public function setNomCompagnie($nomCompagnie)
    {
        $this->nomCompagnie = $nomCompagnie;
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