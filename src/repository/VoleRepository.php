<?php

class VoleRepository{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=vol', 'root', '');
    }

    public function ajouterVole(Vole $vole)
    {
        $sql = "INSERT INTO vole (date_vole,heure_vole,ville_arr,ville_dep,ref_avion,ref_compagnie) VALUES (:date_vole,:heure_vole,:ville_arr,:ville_dep,:ref_avion,:ref_compagnie)";
        $req = $this->bdd->prepare($sql);

        $result = $req->execute(array(
            'nom_compagnie' => $vole->getNomCompagnie(),
            'img_compagnie' => $vole->getImgcompagnie(),
            'date_vole' => $vole->getDatevole(),
            'heure_vole' => $vole->getHeurevole(),
            'ville_arr' => $vole->getVillearr(),
            'ville_dep' => $vole->getVilledep(),
            'ref_avion' => $vole->getRefavion(),
            'ref_compagnie' =>$vole->getRefcompagnie()
        ));

        return $result;
    }

    public function supprimerVole($idVole)
    {
        // Assurez-vous de supprimer d'abord toutes les dépendances, ici la table 'film'
        $sql = "DELETE FROM vole WHERE id_vole = :id_vole";
        $req = $this->bdd->prepare($sql);
        $result = $req->execute(array(
            'id_vole' => $idVole
        ));

        return $result;
    }

    public function modifierVole(Vole $vole)
    {
        $sql = "UPDATE vole SET date_vole = :date_vole,heure_vole = :heure_vole,ville_arr = :ville_arr,ville_dep = :ville_dep,ref_avion = :ref_avion,ref_compagnie = :ref_compagnie WHERE id_vole = :id_vole";
        $req = $this->bdd->prepare($sql);
        $req->execute([
            'id_vole' => $vole->getIdVole(),
            'date_vole' => $vole->getDatevole(),
            'heure_vole' => $vole->getHeurevole(),
            'ville_arr' => $vole->getVillearr(),
            'ville_dep' => $vole->getVilledep(),
            'ref_avion' => $vole->getRefavion(),
            'ref_compagnie' =>$vole->getRefcompagnie()
        ]);

        return $req->rowCount() > 0;
    }
}
?>
