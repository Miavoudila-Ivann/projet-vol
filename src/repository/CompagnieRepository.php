<?php

class CompagnieRepository{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=vol', 'root', '');
    }

    public function ajouterCompagnie(Compagnie $compagnie)
    {
        $sql = "INSERT INTO compagnie (nom_compagnie,img_compagnie) VALUES (:nom_compagnie,:img_compagnie)";
        $req = $this->bdd->prepare($sql);

        $result = $req->execute(array(
            'nom_compagnie' => $compagnie->getNomCompagnie(),
            'img_compagnie' => $compagnie->getImgcompagnie()
        ));

        return $result;
    }

    public function supprimerCompagnie($idCompagnie)
    {
        // Assurez-vous de supprimer d'abord toutes les dépendances, ici la table 'film'
        $sql = "DELETE FROM compgnie WHERE id_compagnie = :id_avion";
        $req = $this->bdd->prepare($sql);
        $result = $req->execute(array(
            'id_compagnie' => $idCompagnie
        ));

        return $result;
    }

    public function modifierAvion(Avion $avion)
    {
        $sql = "UPDATE compagnie SET nom_compagnie = :nom_compagnie, img_compagnie = :img_compagnie WHERE id_compagnie = :id_compagnie";
        $req = $this->bdd->prepare($sql);
        $req->execute([
            'id_avion' => $avion->getIdAvion(),
            'modele_avion' => $avion->getmodeleAvion(),
            'capacite_avion' => $avion->getCapaciteAvion(),
        ]);

        return $req->rowCount() > 0;
    }
}
?>
