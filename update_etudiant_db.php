<?php
include('connexionDB.php');

if (isset($_POST['modifier'])){

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];

    $etudiant=$connexion->prepare('UPDATE etudiant SET nom=:nom, prenom=:prenom, email=:email, date_naissance=:date_naissance WHERE id=:id');
    if($etudiant->execute(array(
        'nom'=>$nom,
        'prenom'=>$prenom,
        'email'=>$email,
        'date_naissance'=>$date_naissance,
        'id'=>$id
        ))){
    header('Location: /examen/etudiants.php');
    }
}
?>