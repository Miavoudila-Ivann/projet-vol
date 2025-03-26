<?php

class ReservationRepository
{
    public function ConfirmReservation(Reservation $reservation){
        $sql = "SELECT ref_utilisateur,ref_vole FROM Reservation WHERE id_reservation = :id_reservation";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'ref_utilisateur' => $reservation->getRef_utilisateur(),
            'ref_vole' => $reservation->getRef_vole(),
        ));

        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }
    public function Reservation(Vole $vole){
        $sql = "SELECT id_vole,date_vole,heure_vole,ville_arr,ville_dep FROM vole WHERE id_vole = :id_vole";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'id_vole' => $vole->getIdVole(),
            'date_vole' => $vole->getDateVole(),
            'heure_vole' => $vole->getHeureVole(),
            'ville_dep' => $vole->getVilleDep(),
            'ville_arr' => $vole->getVilleArr(),
        ));

        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }
}
