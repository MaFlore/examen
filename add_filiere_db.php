<?php
include('connexionDB.php');

if (isset($_POST['ajouter'])){

    $code = $_POST['code'];
    $libelle = $_POST['libelle'];

    $filiere=$connexion->prepare('INSERT INTO filiere(code, libelle) VALUES(:code, :libelle)');
    if($filiere->execute(array(
        'code'=>$code,
        'libelle'=>$libelle
        ))){
    header('Location: /examen/filieres.php');
    }
}
?>