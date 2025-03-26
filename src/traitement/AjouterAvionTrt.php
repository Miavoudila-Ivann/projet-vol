<?php
require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Avion.php';
require_once '../../src/repository/AvionRepository.php';

$database = new Bdd();
$bdd = $database->getBdd();

if (isset($_POST['ok'])) {
    extract($_POST);
    var_dump($_POST);

    if (!empty($modele_avion) && !empty($capacite_avion) && !empty($img_avion)) {
        $AvionRepository = new AvionRepository();

        $avion = new Avion($_POST);
        $avion->setNomFilm($_POST['nom_film']);
        $avion->setGenre($_POST['genre']);
        $avion->setDescription($_POST['description']);
        $avion->setDuree($_POST['duree']);
        $avion->setImage($_POST['image']);


        $resultat = $AvionRepository->ajouterAvion($avion);

        if ($resultat) {
            echo "Ajout réussi!";
            header('Location: ../../vue/Administration.html');
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'avion.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>
