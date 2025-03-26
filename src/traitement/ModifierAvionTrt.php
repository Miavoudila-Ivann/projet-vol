<?php

require_once '../../src/bdd/Bdd.php';
require_once '../../src/repository/AvionRepository.php';
require_once '../../src/modele/Avion.php';

$database = new Bdd();
$bdd = $database->getBdd();

$avionRepository = new AvionRepository($bdd);

if (isset($_POST['ok'])) {
    extract($_POST);


    if (!isset($id_avion) || empty($id_avion)) {
        echo "L'ID de l'avion est requis.";
        exit();
    }

    $imageAvion = isset($imageAvion) && !empty($imageAvion) ? $imageAvion : null;


    $avion = new Avion([
        'idAvion' => $id_avion,
        'modele_avion' => $modele_avion,
        'capacite_avion' => $capacite_avion,
        'img_avion' => $img_avion,
    ]);


    $success = $avionRepository->modifierAvion($avion);


    if ($success) {
        echo "Modification réussie!";
        header('Location: ../../vue/Administration.html');
        exit();
    } else {
        echo "Aucune modification effectuée. Assurez-vous que l'ID de l'avion est correct.";
    }
} else {
    echo "Formulaire non soumis.";
}

?>
