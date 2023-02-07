<?php
include('connexionDB.php');

if (isset($_POST['ajouter'])){

    $etudiant_id = $_POST['etudiant_id'];
    $filiere_id = $_POST['filiere_id'];
    $annee_id = $_POST['annee_id'];

    $inscription=$connexion->prepare('INSERT INTO inscription(etudiant_id, filiere_id, annee_id) VALUES(:etudiant_id, :filiere_id, :annee_id)');
    if($inscription->execute(array(
        'etudiant_id'=>$etudiant_id,
        'filiere_id'=>$filiere_id,
        'annee_id'=>$annee_id
        ))){
    header('Location: /examen/inscriptions.php');
    }
}
?>