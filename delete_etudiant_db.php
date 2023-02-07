<?php

include('connexionDB.php');
$id=$_GET['id'];

$etudiant=$connexion->prepare('DELETE FROM etudiant WHERE id=:id');
$etudiant->execute([':id'=> $id]);

header('Location: /examen/etudiants.php');
?>