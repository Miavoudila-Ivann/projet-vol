<?php

require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Vole.php';
require_once '../../src/repository/VoleRepository.php';


if (isset($_POST['ok'])) {

    $id_seance = $_POST['id_vole'];


    $dateVole = isset($_POST['date_vole']) ? $_POST['date_vole'] : null;
    $heureVole = isset($_POST['heure_vole']) ? $_POST['heure_vole'] : null;
    $villeArr = isset($_POST['ville_arr']) ? $_POST['ville_arr'] : null;
    $villeDep = isset($_POST['ville_dep']) ? $_POST['ville_dep'] : null;
    $ref_avion = isset($_POST['ref_avion']) ? $_POST['ref_avion'] : null;
    $ref_compagnie = isset($_POST['ref_compagnie']) ? $_POST['ref_compagnie'] : null;


    $voleRepository = new VoleRepository();

    $result = $voleRepository->modifierVole($idVole, $dateVole, $heureVole, $villeArr, $villeDep, $ref_avion,$ref_compagnie);

    echo $result;
}
?>
