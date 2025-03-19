<?php

class AvionRepository{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=vol', 'root', '');
    }

    public function ajouterAvion(Avion $avion)
    {
        $sql = "INSERT INTO avion (modele_avion,capacite_avion,img_avion) VALUES (:modele_avion, :capacite_avion, :img_avion)";
        $req = $this->bdd->prepare($sql);

        $result = $req->execute(array(
            'modele_avion' => $avion->getModeleAvion(),
            'capacite_avion' => $avion->getcapaciteAvion(),
            'img_avion' => $avion->getImgAvion()
        ));

        return $result;
    }

    public function supprimerAvion($idAvion)
    {
        // Assurez-vous de supprimer d'abord toutes les dépendances, ici la table 'film'
        $sql = "DELETE FROM avion WHERE id_avion = :id_avion";
        $req = $this->bdd->prepare($sql);
        $result = $req->execute(array(
            'id_avion' => $idAvion
        ));

        return $result;
    }

    public function modifierAvion(Avion $avion)
    {
        $sql = "UPDATE avion SET modele_avion = :modele_avion, capacite_avion = :capacite_avion, img_avion = :img_avion WHERE id_avion = :id_avion";
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
