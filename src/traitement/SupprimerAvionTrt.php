<?php
require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Avion.php';
require_once '../../src/repository/AvionRepository.php';

if (isset($_POST['ok']) && isset($_POST['id_avion'])) {
    $idAvion = intval($_POST['id_avion']);

    $avionRepository = new AvionRepository();

    $resultat = $avionRepository->supprimerAvion($idAvion);

    if ($resultat) {
        echo "Avion supprimé avec succès!";
        header('Location: ../../vue/Administration.html');
        exit();
    } else {
        echo "Erreur lors de la suppression de l'avion.";
    }
} else {
    echo "Données invalides.";
}
?>
