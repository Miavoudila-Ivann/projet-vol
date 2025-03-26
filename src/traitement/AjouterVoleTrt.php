<?php
require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Vole.php';
require_once '../../src/repository/VoleRepository.php';

$database = new Bdd();
$bdd = $database->getBdd();

if (isset($_POST['ok'])) {
    extract($_POST);
    var_dump($_POST);


    if (!empty($dateVole) && !empty($heureVole) && isset($villeArr) && !empty($villeDep) && !empty($ref_avion) && !empty($ref_compagnie)) {

        $donnees = [
            'date_vole' => $_POST['date_vole'],
            'heure_vole' => $_POST['heure_vole'],
            'ville_dep' => $_POST['ville_dep'],
            'ref_avion' => $_POST['ref_avion'],
            'ref_compagnie' => $_POST['ref_compagnie'],
        ];


        $vole = new Vole($donnees);
        var_dump($vole);

        $voleRepository = new VoleRepository();
        $resultat = $voleRepository->ajouterVole($vole);

        if ($resultat) {
            echo "vole ajoutée avec succès!";
            header('Location: ../../vue/ListeVole.php');
            exit();
        } else {
            echo "Erreur lors de l'ajout de la séance.";
        }

    } else {
        echo "Tous les champs sont requis.";
    }
}
?>