<?php
require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Compagnie.php';
require_once '../../src/repository/CompagnieRepository.php';

$database = new Bdd();
$bdd = $database->getBdd();

if (isset($_POST['ok'])) {
    // Récupération de l'ID de la compagnie à supprimer
    $idSalle = $_POST['id_compagnie'];

    if (!empty($idCompagnie)) {
        // Création du repository
        $compagnieRepository = new CompagnieRepository();

        // Tentative de suppression de la compagnie
        $resultat = $compagnieRepository->supprimerCompagnie($idCompagnie);

        if ($resultat) {
            echo "Compagnie supprimée avec succès!";
            header('Location: ../../vue/Administration.html'); // Redirection après suppression
            exit();
        } else {
            echo "Erreur lors de la suppression de la compagnie.";
        }
    } else {
        echo "Veuillez spécifier l'ID de la compagnie.";
    }
}
?>
