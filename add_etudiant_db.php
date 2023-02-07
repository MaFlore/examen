<?php
include('connexionDB.php');

if (isset($_POST['ajouter'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];

    $etudiant=$connexion->prepare('INSERT INTO etudiant(nom, prenom, email, date_naissance) VALUES(:nom, :prenom, :email, :date_naissance)');
    if($etudiant->execute(array(
        'nom'=>$nom,
        'prenom'=>$prenom,
        'email'=>$email,
        'date_naissance'=>$date_naissance
        ))){
    header('Location: /examen/etudiants.php');
    }
}
?>