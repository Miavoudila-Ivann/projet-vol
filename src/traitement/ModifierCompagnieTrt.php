<?php

require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Compagnie.php';
require_once '../../src/repository/CompagnieRepository.php';

$database = new Bdd();
$bdd = $database->getBdd();

if (isset($_POST['ok'])) {
    // Récupération des données depuis le formulaire
    $idCompagnie = $_POST['idCompgnie'];
    $nomCompagnie = $_POST['nomCompagnie'];
    $imgComagnie = $_POST['imgComagnie'];

    // Création de l'objet Salle avec les données
    $compagnieRepository = new CompagnieRepository();
    $compagnie = new Compagnie($idCompagnie, $nomCompagnie, $imgComagnie);

    // Tentative de modification de la salle
    $resultat = $compagnieRepository->modifierCompagnie($compagnie);
    if ($resultat) {
        echo "Modification réussie!";
        header('Location: ../../vue/Administration.html');
        exit();
    } else {
        echo "Erreur lors de la modification.";
    }
}
?>
