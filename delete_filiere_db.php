<?php

include('connexionDB.php');
$id=$_GET['id'];

$filiere=$connexion->prepare('DELETE FROM etudiant WHERE id=:id');
$filiere->execute([':id'=> $id]);

header('Location: /examen/filieres.php');
?>