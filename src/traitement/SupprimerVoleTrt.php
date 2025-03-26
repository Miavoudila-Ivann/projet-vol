<?php
require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Vole.php';
require_once '../../src/repository/VoleRepository.php';

$database = new Bdd();
$bdd = $database->getBdd();

if (isset($_POST['ok'])) {
    $id_Seance = $_POST['id_seance'];

    if (!empty($idVole)) {
        $voleRepository = new VoleRepository();

        $resultat = $voleRepository->supprimerVole($idVole);


        if ($resultat) {
            echo "Vole supprimée avec succès!";
            header('Location: ../../vue/Administration.html');
            exit();
        } else {
            echo "Erreur lors de la suppression du vole.";
        }
    } else {
        echo "Veuillez spécifier l'ID de la vole.";
    }
}
?>
