<?php
include('connexionDB.php');

if (isset($_POST['modifier'])){

    $id = $_POST['id'];
    $etudiant_id = $_POST['etudiant_id'];
    $filiere_id = $_POST['filiere_id'];
    $annee_id = $_POST['annee_id'];

    $inscription=$connexion->prepare('UPDATE inscription SET etudiant_id=:etudiant_id, filiere_id=:filiere_id, annee_id=:annee_id WHERE id=:id');
    if($inscription->execute(array(
        'etudiant_id'=>$etudiant_id,
        'filiere_id'=>$filiere_id,
        'annee_id'=>$annee_id,
        'id'=>$id
        ))){
    header('Location: /examen/inscriptions.php');
    }
}
?>