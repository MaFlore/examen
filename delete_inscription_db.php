<?php

include('connexionDB.php');
$id=$_GET['id'];

$inscription=$connexion->prepare('DELETE FROM inscription WHERE id=:id');
$inscription->execute([':id'=> $id]);

header('Location: /examen/inscriptions.php');
?>