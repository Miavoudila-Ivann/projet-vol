<?php

require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Utilisateur.php';
require_once '../../src/repository/UtilisateurRepository.php';

if (isset($_POST['ok'])) {

    if (isset($_POST['ok']) && isset($_POST['idUtilisateur'])) {
        $idUtilisateur = intval($_POST['idUtilisateur']);

        $UtilisateurRepository = new utilisateurRepository();
        $Utilisateur = new Utilisateur([
            'idUtilisateur' => $idUtilisateur,
        ]);

        $resultat = $UtilisateurRepository->supprimerUtilisateur($Utilisateur);

        if ($resultat) {
            echo "Film supprimé avec succès!";
            header('Location: ../../vue/Administration.html');
            exit();
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }
    } else {
        echo "Données invalides.";
    }
}
?>