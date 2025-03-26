<?php
require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Compagnie.php';
require_once '../../src/repository/CompagnieRepository.php';

$database = new Bdd();
$bdd = $database->getBdd();

if (isset($_POST['ok'])) {
    // Récupération des données depuis le formulaire
    $nomCompagnie = $_POST['nom_compagnie'];
    $imgCompagnie = $_POST['img_compagnie'];

    // Vérification que les champs ne sont pas vides
    if (!empty($nomCompagnie) && !empty($imgCompagnie)) {
        // Création de l'objet Compagnie
        $CompagnieRepository = new CompagnieRepository();
        $compagnie = new Compagnie(null, $nomCompagnie, $imgCompagnie);  // 'null' pour l'id puisque c'est un nouvel enregistrement

        // Tentative d'ajout de la salle
        $resultat = $CompagnieRepository->ajouterCompagnie($compagnie);

        if ($resultat) {
            echo "Ajout réussi!";
            header('Location: ../../vue/Administration.html'); // Redirection après ajout
            exit();
        } else {
            echo "Erreur lors de l'ajout de la compagnie.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>
